var canvas;
var context;
var battery = new Image();
var light = new Image();
var lightUnlit = new Image();
var lightSwitch = new Image();
var isOn = false;
var currentFrame = 0;
var batteryCharge = 0; // 0 is the highest charge level 100 is lowest

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


  if(isOn == true && batteryCharge < 100) {
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
  drawLine(100, 230, 100, 140, 'red'); // segment 1
  drawLine(100, 145, 400, 145, 'red'); // segment 2

  if(isOn == true && batteryCharge < 100) {
    color = 'red';
  } else {
    color = 'white';
  }

  drawLine(490, 145, 740, 145, color); // segment 3
  drawLine(740, 140, 740, 280, color); // segment 4
  drawLine(740, 275, 760, 275, color); // segment 5
  drawLine(760, 309, 740, 309, color); // segment 6
  drawLine(740, 304, 740, 440, color); // segment 7
  drawLine(100, 435, 740, 435, color); // segment 8
  drawLine(100, 350, 100, 440, color); // segment 9
  var offset = 0;

  /* draw the energy flow */
  // segment 1
  for(i=245 + offset; i>100; i-=50) {
    context.beginPath();
    context.arc(100, i, 10, 0, 2*Math.PI);
    context.fillStyle = 'red';
    context.fill();
    context.closePath();
  }

  //context.beginPath();
  //context.fillRect(75, 250, 50, 90);
  //context.fillStyle = 'black';
  //context.closePath();

  /* draw the battery */
  // the background
  context.fillStyle = 'black';
  context.fillRect(75, 245, 50, 100);

  // current charge
  if((currentFrame % 6) == 0) {
    if(isOn == true && batteryCharge < 100) {
      batteryCharge+=1;
    }
  }//end frame check
  context.fillStyle = 'green';
  context.fillRect(75, 245 + batteryCharge, 50, 100 - batteryCharge); // starts at 245/100

  // fix part of the outline
  //context.filleStyle = 'white';
  //context.fillRect(75, 200, 10, 10);

  // the outline
  context.drawImage(battery, 0, 190, 200,200);

  // go to the next frame
  if(currentFrame >= 60) {
    currentFrame = 0;
  } else {
    currentFrame++;
  }//end if/else
  window.requestAnimationFrame(drawScreen);
}//end drawScreen

function onMainSwitchClick() {
  isOn = !isOn;
}//end onMainSwitchClick

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
