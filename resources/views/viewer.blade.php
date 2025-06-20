<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Babylon.js Viewer - GLB</title>
  <script type="module" src="https://cdn.jsdelivr.net/npm/@babylonjs/viewer/dist/babylon-viewer.esm.min.js"></script>
  <style>
    body { margin: 0; }
    babylon-viewer {
      width: 100%;
      height: 100vh;
      display: block;
    }
  </style>
</head>
<body>
  <babylon-viewer
  source="/assets/map.glb"
  autoplay
  camera-auto-rotate
  camera-target="0 1 0"
  reframe
  style="width: 100%; height: 100vh;"
></babylon-viewer>

</body>
</html>
