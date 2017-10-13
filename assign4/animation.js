var battery = new Image();

function init(canvas) {

  battery.src = '../content/images/icon-power.png';

  console.log("loading image...");
  battery.onLoad = function(){run(canvas)};
}

function run(canvas) {
  console.log("Drawing stuff!");
  canvas.drawImage(battery, 0, 0);

  canvas.moveTo(0,0);
  canvas.lineTo(300,150);
  canvas.strokeStyle = 'white';
  canvas.stroke();
}
