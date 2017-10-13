var battery = new Image();
var light = new Image();
var lightUnlit = new Image();
var lightSwitch = new Image();

function init() {
  canvas = $('#mainCanvas')[0];
  context = canvas.getContext("2d");
  canvas.addEventListener("click", onCanvasClick, false);

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
    run(context);
  });
  loader.start();
}//end init

function run(context) {
  // draw the images
  context.drawImage(battery, 0, 190, 200,200);
  context.drawImage(lightUnlit, 750, 195, 200, 200);

  // clip the image so that we get just the switch we want
  context.drawImage(lightSwitch, 0, 0, 294, 294, 390, 100, 100, 100);

  //context.drawImage(lightSwitch, 0, 294, 294, 294,  440, 100, 100, 100);
  //context.drawImage(lightSwitch, 0, 588, 294, 294,  440, 100, 100, 100);

  // draw the wires
  drawLine(100, 230, 100, 140);
  drawLine(100, 145, 400, 145);
  drawLine(490, 145, 740, 145);
  drawLine(740, 140, 740, 280);
  drawLine(740, 275, 760, 275);
  drawLine(760, 309, 740, 309);
  drawLine(740, 304, 740, 440);
  drawLine(100, 435, 740, 435);
  drawLine(100, 350, 100, 440);
}//end run

function drawLine(startX, startY, endX, endY) {
  context.strokeStyle = 'white';
  context.lineWidth = 10;

  context.moveTo(startX, startY);
  context.lineTo(endX, endY);
  context.stroke();
}//end drawLine

function onCanvasClick(e) {
  console.log(e.PageX, e.PageY);
}//end oncontextClick
