var canvas;
var context;
var battery = new Image();
var light = new Image();
var lightUnlit = new Image();
var lightSwitch = new Image();
var isOn = false;

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
    window.requestAnimationFrame(drawScreen);
  });
  loader.start();
}//end init

//context.drawImage(lightSwitch, 0, 294, 294, 294,  440, 100, 100, 100);
//

function drawScreen() {
  context.clearRect(0, 0, 1000, 600);

  // draw the images
  context.drawImage(battery, 0, 190, 200,200);

  if(isOn == true) {
    context.drawImage(light, 750, 195, 200, 200);
  } else {
    context.drawImage(lightUnlit, 750, 195, 200, 200);
  }

  // clip the image so that we get just the switch we want
  if(isOn == true) {
    context.drawImage(lightSwitch, 0, 580, 294, 294,  390, 93, 100, 100);
  } else {
    context.drawImage(lightSwitch, 0, 0, 294, 294, 390, 100, 100, 100);
  }


  // draw the wires
  drawLine(100, 230, 100, 140, 'red');
  drawLine(100, 145, 400, 145, 'red');

  if(isOn == true) {
    color = 'red';
  } else {
    color = 'white';
  }

  drawLine(490, 145, 740, 145, color);
  drawLine(740, 140, 740, 280, color);
  drawLine(740, 275, 760, 275, color);
  drawLine(760, 309, 740, 309, color);
  drawLine(740, 304, 740, 440, color);
  drawLine(100, 435, 740, 435, color);
  drawLine(100, 350, 100, 440, color);

  window.requestAnimationFrame(drawScreen);
}

function onMainSwitchClick() {
  isOn = !isOn;
}

function drawLine(startX, startY, endX, endY, color = 'white') {
  // set to default color if nothing is specified
  //color = color || 'white';

  context.strokeStyle = color;
  context.lineWidth = 10;

  context.beginPath();
  context.moveTo(startX, startY);
  context.lineTo(endX, endY);
  context.stroke();
  context.closePath();
}//end drawLine

// Determine where the user clicked and call the appropriate function
function onCanvasClick(e) {
  var pos = getMousePos(canvas, e);
  //console.log("Coordinates are: " + pos.x + " " + pos.y);

  if(pos.x > 390 && pos.x < 490 && pos.y > 100 && pos.y < 200) {
    onMainSwitchClick();
    console.log("switch clicked!");
  }
}//end oncontextClick

// Get the mouse position reletive to the canvas
function getMousePos(canvas, evt) {
  var rect = canvas.getBoundingClientRect();
  return {
    x: evt.clientX - rect.left,
    y: evt.clientY - rect.top
  };
}//end getMousePos
