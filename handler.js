const bcrypt = require("bcrypt");
const jwt = require("jsonwebtoken");
const createConnection = require("./dbhandler");

const checkIfTableExists = async (db) => {
  // Check if the 'user' table exists
  const [rows] = await db.execute("SHOW TABLES LIKE 'user'");
  return rows.length > 0;
};

const createTable = async (db) => {
  // Create the 'user' table if it doesn't exist
  await db.execute(`
    CREATE TABLE IF NOT EXISTS user (
      userid INT AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(255) NOT NULL,
      password VARCHAR(255) NOT NULL,
      name VARCHAR(255) NOT NULL,
      email VARCHAR(255) NOT NULL
    )
  `);
};

const login = async (request, h) => {
  try {
    const { username, password } = request.payload;

    if (!username || !password) {
      return h.response({
        status: "Failed",
        message: "Login gagal. Harap masukkan username dan password.",
        code: 400,
      });
    }

    const db = await createConnection();

    // Check if the 'user' table exists, create it if not
    const tableExists = await checkIfTableExists(db);
    if (!tableExists) {
      await createTable(db);
    }

    const [rows] = await db.execute("SELECT * FROM user WHERE username = ?", [username]);

    if (rows.length > 0) {
      const isValidPassword = await bcrypt.compare(password, rows[0].password);

      if (isValidPassword) {
        return h.response({
          status: "Success",
          message: "Berhasil Login",
          code: 200,
          username: rows[0].username,
          name: rows[0].name,
          email: rows[0].email,
        });
      } else {
        return h.response({
          status: "Failed",
          message: "Login gagal. Password salah.",
          code: 401,
        });
      }
    } else {
      return h.response({
        status: "Failed",
        message: "Login gagal. Pengguna tidak ditemukan.",
        code: 401,
      });
    }
  } catch (error) {
    console.error('Error during login:', error);
    return h.response({
      status: "Failed",
      message: "Terjadi kesalahan internal saat login.",
      code: 500,
    });
  }
};

// GET /user
const getUser = async (request, h) => {
  try {
    const db = await createConnection();
    const [rows] = await db.execute("SELECT userid, username, name, email FROM user");

    return h.response({
      status: "Success",
      message: "Berhasil mendapatkan data pengguna",
      code: 200,
      data: rows,
    });
  } catch (error) {
    console.error('Error getting user data:', error);
    return h.response({
      status: "Failed",
      message: "Terjadi kesalahan internal saat mendapatkan data pengguna.",
      code: 500,
    });
  }
};

// POST /user
const registerUser = async (request, h) => {
  try {
    const { username, password, name, email } = request.payload;
    const db = await createConnection();

    // Check if the 'user' table exists, create it if not
    const tableExists = await checkIfTableExists(db);
    if (!tableExists) {
      await createTable(db);
    }

    // Check if username is already registered
    const [usernameRows] = await db.execute("SELECT * FROM user WHERE username = ?", [username]);
    if (usernameRows.length > 0) {
      return h.response({
        status: "Error",
        message: "Username sudah terdaftar, mohon gunakan username yang lain",
        code: 400,
      });
    }

    // Hash the password and insert the user into the database
    const hashedPassword = await bcrypt.hash(password, 10);
    // const [result] = await db.execute("INSERT INTO user (username, password, name, email) VALUES (?, ?, ?, ?)", [username, hashedPassword, name, email]);
     // Filter out undefined values and replace with null
     const filteredValues = [username, hashedPassword, name, email].map(value => value !== undefined ? value : null);

     const [result] = await db.execute(
       "INSERT INTO user (username, password, name, email) VALUES (?, ?, ?, ?)",
       filteredValues
     );
      
    return h.response({
      status: "Success",
      message: "Berhasil Register",
      code: 201,
      userid: result.insertId,
    });

  } catch (error) {
    console.error('Error during registration:', error);
    return h.response({
      status: "Failed",
      message: "Terjadi kesalahan internal saat registrasi.",
      code: 500,
    });
  }
};

module.exports = {
  login,
  getUser,
  registerUser
};
