$(document).ready(() => {
  carregarElaboradores();
});


function getCookie(cookieName) {
  const cookie = {};
  document.cookie.split(";").forEach((element) => {
    const [key, value] = element.split("=");
    cookie[key.trim()] = value;
  });
  return cookie[cookieName];
}
