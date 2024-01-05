const {
    login,
    getUser,
    registerUser,
  } = require('./handler');
  
  const routes = [
    {
      method: "POST",
      path: "/login",
      handler: login,
    },
    {
      method: "GET",
      path: "/user",
      handler: getUser,
    },
    {
      method: "POST",
      path: "/user",
      handler: registerUser,
    },
  ];
  
  module.exports = routes;
  