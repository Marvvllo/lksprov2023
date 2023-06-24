const { default: axios } = require("axios");

const postLogin = async (
  {
    id_card_number,
    password
  }
) => {
  const apiURL = "http://127.0.0.1:8000/api/v1/auth/login"
  return await axios.post(apiURL, { id_card_number, password });
};


export { postLogin }