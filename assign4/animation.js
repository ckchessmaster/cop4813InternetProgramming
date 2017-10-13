var canvas;
var battery = new Image();
var light = new Image();
var light_unlit = new Image();

function init() {
  canvas = $('#mainCanvas')[0].getContext("2d");

  // load all images before continuing
  var loader = new PxLoader(),
      battery = loader.addImage('../content/images/icon-power.png'),
      light = loader.addImage('../content/images/light-bulb-lit.png'),
      light_unlit = loader.addImage('../content/images/light-bulb.png');
  loader.addCompletionListener(function() {
    this.battery = battery;
    this.light = light;
    this.light_unlit = light_unlit;
    run()
  });
  loader.start();
}

function run() {
  canvas.drawImage(battery, 0, 200, 200,200);
  canvas.drawImage(light, 800, 200, 200, 200);
  canvas.drawImage(light_unlit, 800, 200, 200, 200);

  
}
