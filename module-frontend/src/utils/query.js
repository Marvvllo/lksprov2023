const { default: axios } = require("axios");

const postLogin = async (
  {
    id_card_number,
    password
  }
) => {
  const apiURL = process.env.API_URL + "api/v1/auth/login"
  const response = await axios.post(apiURL, { id_card_number, password });
  return response.data;
};

export { postLogin }