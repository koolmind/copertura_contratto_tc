const offerte = document.querySelectorAll(".offer-single");
const opzioni = document.querySelectorAll("[data-prodotti]");

const cartNome = document.querySelector(`#cart-nome-offerta`);
const cartFeatures = document.querySelector(`#cart-caratteristiche-offerta`);
const cartCanone = document.querySelector(`#cart-canone`);
const cartAttivazione = document.querySelector(`#cart-attivazione`);

let selectedOffer = null;

const selezionaOfferta = (evt) => {
  selectedOffer = evt.target.closest(".offer-single");
  selectedOffer.classList.add("active");
};

const deselezionaOfferta = (tgt) => {
  if (tgt) {
    tgt.classList.remove("active");
  }
};

const updateOfferOptions = () => {
  const offerID = selectedOffer.dataset.offer;
  opzioni.forEach((opz) => {
    const prodCollegati = opz.dataset.prodotti.split(/;/);

    if (!prodCollegati.includes(offerID)) opz.classList.add("nascondi");
    else opz.classList.remove("nascondi");
  });
};

updateOfferData = () => {
  const offerID = selectedOffer.dataset.offer;
  const offerName = selectedOffer.dataset.name;
  const offerPrice = selectedOffer.dataset.price;

  let offerAttivazione = selectedOffer.dataset.attivazione;
  if (offerAttivazione == "0") offerAttivazione == "GRATUITA";

  cartNome.textContent = offerName;
  cartCanone.textContent = offerPrice;
  cartAttivazione.textContent = offerAttivazione;
};

offerte.forEach((offerta) => {
  offerta.addEventListener("click", (evt) => {
    deselezionaOfferta(selectedOffer);
    selezionaOfferta(evt);
    updateOfferOptions();
    updateOfferData();
  });
});
