			//var fileName = "../3d_file_storage/porsche.obj";
//			document.body.addEventListener("keydown", function() {
//  			THREEx.FullScreen.request();
//			}, false);

			var fileName =
			"../3d_file_storage/" + document.getElementById("weila").innerHTML + ".obj";
			var container;
			var camera, scene, renderer;
			var mouseX = 0, mouseY = 0;
			var windowHalfX = window.innerWidth / 2;
			var windowHalfY = window.innerHeight / 2;
			var myObject = null;
			init();
			animate();
			function init() {
				container = document.createElement( 'div' );
				document.body.appendChild( container );
				camera = new THREE.PerspectiveCamera( 70, window.innerWidth / window.innerHeight, 10, 8000 );
				camera.position.x = 0;
				camera.position.y = 5;
				camera.position.z = -23;
				// scene
				scene = new THREE.Scene();
				var ambient = new THREE.AmbientLight( 0x808080 );
				scene.add( ambient );
				var directionalLight = new THREE.DirectionalLight( 0xffeedd );
				directionalLight.position.set( 70, 10, 80 );
				scene.add( directionalLight )
				
				var manager = new THREE.LoadingManager();
				manager.onProgress = function ( item, loaded, total ) {
					console.log( item, loaded, total );
				};
				// texture
				var texture = new THREE.Texture();
				
				var onProgress = function ( xhr ) {
					if ( xhr.lengthComputable ) {
						percentComplete = xhr.loaded / xhr.total * 100;
						console.log( Math.round(percentComplete, 2) + '% downloaded');
					}
				};
				var onError = function ( xhr ) {
				};
				var loader = new THREE.ImageLoader( manager );
				loader.load( "../textures/" + document.getElementById("texture").innerHTML + ".jpg", function ( image ) {
					texture.image = image;
					texture.needsUpdate = true;
				} );
				// model
				var loader = new THREE.OBJLoader( manager );
				loader.load( fileName, function ( object ) {
					object.traverse( function ( child ) {
						if ( child instanceof THREE.Mesh ) {
							child.material.map = texture;
						}
					} );
					object.position.y = 0;
					object.position.z = 0;
					object.position.x = 0;
					object.scale.x = 30;
					object.scale.y = 30;
					object.scale.z = 30;
					scene.add( object );

					myObject = object;
	
				}, onProgress, onError );
				//
				renderer = new THREE.WebGLRenderer();
				renderer.setPixelRatio( window.devicePixelRatio );
				renderer.setSize( window.innerWidth, window.innerHeight );
				container.appendChild( renderer.domElement );
				document.addEventListener( 'mousemove', onDocumentMouseMove, false );
				//
				window.addEventListener( 'resize', onWindowResize, false );
			}
			function onWindowResize() {
				windowHalfX = window.innerWidth / 2;
				windowHalfY = window.innerHeight / 2;
				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();
				renderer.setSize( window.innerWidth, window.innerHeight );
			}
			function onDocumentMouseMove( event ) {
				mouseX = ( event.clientX - windowHalfX ) / 2;
				mouseY = ( event.clientY - windowHalfY ) / 2;
			}
			//
			function animate() {
				requestAnimationFrame( animate );
				render();
			}
			function render() {
				camera.position.x += ( mouseX - camera.position.x ) * .05;
				camera.position.y += ( - mouseY - camera.position.y ) * .05;
				camera.lookAt( scene.position );
				renderer.render( scene, camera );
			}
			//zoom
			function zoomIn(){
              camera.position.z -= 100;
              camera.updateProjectionMatrix();
              zoom = camera.position.z;
            }
            function zoomOut(){
              camera.position.z += 100;
              camera.updateProjectionMatrix();
              zoom = camera.position.z;
            }

            function scalePlus(){
            myObject.scale.x += 10;
			myObject.scale.y += 10;
			myObject.scale.z += 10;
			}

			function scaleMinus(){
            myObject.scale.x -= 10;
			myObject.scale.y -= 10;
			myObject.scale.z -= 10;
			}