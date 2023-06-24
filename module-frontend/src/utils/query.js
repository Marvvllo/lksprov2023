const { default: axios } = require("axios");

const postLogin = async (
  data
) => {
  const apiURL = process.env.API_URL + "api/v1/auth/login"
  return await axios.post(apiURL, data);
};

export { postLogin }