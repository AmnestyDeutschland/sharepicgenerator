/* eslint-disable no-undef */
// eslint-disable-next-line no-unused-vars
const bgpic = {
  width: 800,
  height: 450,
  originalWidth: 1920,
  originalHeight: 1080,
  filename: '/assets/bg_small.jpg',
  fullBackgroundName: '../assets/bg.jpg',
};

const claimtext = "Bereit, weil ihr es seid.";
const claimWidth = 50;

var initialized = false;

$(document).ready(() => {
  $('#textsize').val(502);
  $('#textX').val(41);
  $('#textY').val(372);

  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const clickId = urlParams.get('clickId');
  $(`#${clickId}`).click();

  logo.resize($('#logosize').val());

  $('#addtextX').val(50);
  $('#addtextY').val(draw.height() - 50);

  showLayout();
  showAdvertising('sunflower');

  $('.close-target').click(function doCloseTarget() {
    $($(this).data('target')).slideUp();
  });
});

function showAdvertising(ad) {
  $('.advertising').hide();

  if (config.user.prefs.advertising_seen === ad) {
    return;
  }

  $('.advertising').delay(1000).slideDown('slow');
  config.user.prefs.advertising_seen = ad;
  setUserPrefs();
}

// eslint-disable-next-line no-unused-vars
function initSharepic() {
  if (initialized) {
    return false;
  }
  // called after background pic is loaded
  $('#sizepresets').val('1200:1200').trigger('change');
  $('#textY').val(320);
  $('#textsize').val(402);
  initialized = true;

  background.drawColor();

  return true;
}

// eslint-disable-next-line no-unused-vars
function reset() {
  // do nothing, stay here
}

// eslint-disable-next-line no-unused-vars
function reDraw(withAddPic = false) {
  if (withAddPic === true) {
    addPic1.draw();
    addPic2.draw();
    addPic3.draw();
    addPic4.draw();
    addPic5.draw();
  }

  window.setTimeout(() => {
    pin.draw();
  }, 10);

  window.setTimeout(() => {
    copyright.draw();
    icon.load();
  }, 20);

  window.setTimeout(() => {
    logo.load();
    text.draw();
    addtext.draw();
    quote.draw();
    nolines.draw();
    area.draw();
    invers.draw();
    eraser.draw();
  }, 100);

  if ($('#backgroundFlipped').val() === 'true') {
    $('#backgroundflip').click();
  }
}
