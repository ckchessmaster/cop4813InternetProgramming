var battery = new Image();
var light = new Image();
var lightUnlit = new Image();
var lightSwitch = new Image();

function init() {
  canvas = $('#mainCanvas')[0].getContext("2d");

  // load all images before continuing
  var loader = new PxLoader(),
      battery = loader.addImage('../content/images/icon-power.png'),
      light = loader.addImage('../content/images/light-bulb-lit.png'),
      lightUnlit = loader.addImage('../content/images/light-bulb.png');
      lightSwitch = loader.addImage('../content/images/Switch.png');
  loader.addCompletionListener(function() {
    this.battery = battery;
    this.light = light;
    this.lightUnlit = lightUnlit;
    this.lightSwitch = lightSwitch;
    run(canvas);
  });
  loader.start();
}

function run(canvas) {
  // draw the images
  canvas.drawImage(battery, 0, 190, 200,200);
  canvas.drawImage(lightUnlit, 750, 195, 200, 200);

  // clip the image so that we get just the switch we want
  canvas.drawImage(lightSwitch, 0, 0, 294, 294,  440, 100, 100, 100);

  //canvas.drawImage(lightSwitch, 0, 294, 294, 294,  440, 100, 100, 100);
  //canvas.drawImage(lightSwitch, 0, 588, 294, 294,  440, 100, 100, 100);

  // draw the wires
  //drawLine(490,0, 490,600);
  //drawLine(0,290, 1000,290);
}

function drawLine(startX, startY, endX, endY) {
  canvas.strokeStyle = 'white';
  canvas.lineWidth = 10;

  canvas.moveTo(startX, startY);
  canvas.lineTo(endX, endY);
  canvas.stroke();
}

// rotate then draw image
function rotateDrawImage(canvas, image, x, y, degrees, scale) {
  canvas.save();
  canvas.translate(x, y);
  canvas.rotate((degrees*Math.PI)/180)
  canvas.drawImage(image, 0, 0, scale, scale);
  canvas.restore();
}
