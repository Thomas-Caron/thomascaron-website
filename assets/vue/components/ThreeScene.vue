<template>
    <div ref="threeContainer" class="w-full h-full">
        <canvas ref="threeCanvas" class="block w-full h-full"></canvas>
    </div>
</template>

<script setup>
import { onMounted, ref, onBeforeUnmount } from 'vue';
import * as THREE from 'three';
import gsap from "gsap";

const threeContainer = ref(null);
const threeCanvas = ref(null);
let scene, camera, renderer, raycaster;
let meshes = [];
let mouse = new THREE.Vector2();
let animationFrameId = null;

// 🟢 Fonction d'initialisation
const init = () => {
    if (!threeCanvas.value || !threeContainer.value) return;

    // 🔹 Initialisation de la scène et de la caméra
    scene = new THREE.Scene();
    camera = new THREE.PerspectiveCamera(75, threeContainer.value.clientWidth / threeContainer.value.clientHeight, 0.1, 1000);
    camera.position.z = 12;

    // 🔹 Initialisation du renderer avec le canvas existant
    renderer = new THREE.WebGLRenderer({ canvas: threeCanvas.value, antialias: true, alpha: true });
    renderer.setSize(threeContainer.value.clientWidth, threeContainer.value.clientHeight);
    renderer.shadowMap.enabled = true;

    // 🔹 Lumière principale
    const light = new THREE.DirectionalLight(0xffffff, 1);
    light.position.set(5, 20, 5);
    light.castShadow = true;
    scene.add(light);

    // 🔹 Lumière d'ambiance
    const ambientLight = new THREE.AmbientLight(0xffffff, 5);
    scene.add(ambientLight);

    // 🔹 Configurer l'ombre
    light.shadow.mapSize.width = 2048;
    light.shadow.mapSize.height = 2048;
    light.shadow.radius = 20;
    light.shadow.camera.near = 0.5;
    light.shadow.camera.far = 50;
    light.shadow.camera.left = -50;

    // 🔹 Ajouter un plan au sol qui reçoit l'ombre
    const planeGeometry = new THREE.PlaneGeometry(20, 20);
    const planeMaterial = new THREE.ShadowMaterial({ opacity: 0.4 });
    const plane = new THREE.Mesh(planeGeometry, planeMaterial);
    plane.rotation.x = -Math.PI / 2;
    plane.position.y = -3;
    plane.receiveShadow = true;
    scene.add(plane);

    // 🔹 Matériau
    const material = new THREE.MeshPhysicalMaterial({
        color: 0xf4be7e,
        metalness: 1.0,
        roughness: 0.2,
        thickness: 1.0,
        clearcoat: 2.0,
        clearcoatRoughness: 0.5,
        transmission: 1.4,
        ior: 1.0,
        envMapIntensity: 1.5,
    });

    // 🔹 Définition des formes
    const geometries = [
        { geometry: new THREE.IcosahedronGeometry(3), shadow: true, position: [0, 0, 0], scale: 1.2 },
        { geometry: new THREE.DodecahedronGeometry(1.5), shadow: false, position: [-2.7, 4.5, -3], scale: 1.1 },
        { geometry: new THREE.TorusGeometry(0.6, 0.25, 16, 32), shadow: true, position: [-1.9, -1.8, 5], scale: 1.2 },
        { geometry: new THREE.OctahedronGeometry(1.5), shadow: false, position: [2.5, 4, -2], scale: 1 },
        { geometry: new THREE.CapsuleGeometry(0.5, 1.6, 2, 16), shadow: true, position: [2.3, -0.75, 4], scale: 0.9 },
    ];

    meshes = geometries.map(({ geometry, position, scale, shadow }) => {
        const mesh = new THREE.Mesh(geometry, material);
        mesh.position.set(...position);
        mesh.scale.set(scale, scale, scale);
        mesh.originalPosition = new THREE.Vector3(...position);
        mesh.castShadow = shadow;
        mesh.receiveShadow = false;

        scene.add(mesh);

        return mesh;
    });

    // 🔹 Création du raycaster
    raycaster = new THREE.Raycaster();

    // 🔹 Ajouter l'effet d'apparition
    addElasticEffectOnLoad();

    // 🔹 Lancer l'animation
    animate();
};

// 🟢 Ajouter l'effet élastique à l'affichage des objets
const addElasticEffectOnLoad = () => {
    meshes.forEach((mesh, index) => {
        gsap.from(mesh.position, {
            duration: 1,
            y: mesh.position.y - 1,
            ease: "elastic.out(1, 0.3)"
        });

        gsap.from(mesh.scale, {
            duration: 1,
            x: 0,
            y: 0,
            z: 0,
            ease: "elastic.out(1, 0.3)"
        });
    });
};

// 🟢 Gestion des mouvements de la souris
const onMouseMove = (event) => {
    const rect = threeContainer.value.getBoundingClientRect();
    mouse.x = ((event.clientX - rect.left) / rect.width) * 2 - 1;
    mouse.y = -((event.clientY - rect.top) / rect.height) * 2 + 1;

    // Calculer les intersections avec les objets de la scène
    raycaster.setFromCamera(mouse, camera);
    const intersects = raycaster.intersectObjects(meshes);

    // Si on survole un objet, change le curseur en "pointer"
    if (intersects.length > 0) {
      document.body.style.cursor = 'pointer';
    } else {
      document.body.style.cursor = 'default';
    }
};


// 🟢 Animation des objets
const animate = () => {
    animationFrameId = requestAnimationFrame(animate);
    const time = performance.now() * 0.002;

    // 🔹 Mise à jour du raycaster
    raycaster.setFromCamera(mouse, camera);
    const intersects = raycaster.intersectObjects(meshes);

    meshes.forEach((mesh, index) => {
        // 🌀 Rotation des objets
        mesh.rotation.x += 0.001;
        mesh.rotation.y += 0.002;
        mesh.rotation.z += 0.001;

        // 🌊 Effet de flottement
        mesh.position.y = mesh.originalPosition.y + Math.sin(time + index) * 0.07;

        const distanceX = mouse.x * 5;
        const distanceY = mouse.y * 5; 

        // // 🔹 Détecter si la souris est au-dessus de l'objet
        if (intersects.length > 0 && intersects[0].object === mesh) {
            mesh.position.x = mesh.originalPosition.x + distanceX * 0.1;
            mesh.position.y = mesh.originalPosition.y + distanceY * 0.1;

        } else {
            mesh.position.lerp(mesh.originalPosition, 0.1);
        }
    });

    renderer.render(scene, camera);
};

// 🟢 Gestion du clic pour la rotation
const handleClick = (event) => {
    raycaster.setFromCamera(mouse, camera);
    const intersects = raycaster.intersectObjects(meshes);

    if (intersects.length > 0) {
        const mesh = intersects[0].object;

        gsap.to(mesh.rotation, {
            duration: 2,
            x: mesh.rotation.y + Math.PI * 0.5,
            y: mesh.rotation.y + Math.PI * 0.8,
            ease: "elastic.out(1, 0.3)",
        });
    }
};

// 🟢 Ajuste la caméra
const adjustCamera = () => {
    if (!camera) return;
    const screenWidth = window.innerWidth;

    if (screenWidth <= 1024) {
        camera.position.z = 16;
    } else {
        camera.position.z = 12;
    }
};

// 🟢 Gestion du resize
const onResize = () => {
    if (!camera || !renderer || !threeContainer.value) return;
    
    camera.aspect = threeContainer.value.clientWidth / threeContainer.value.clientHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(threeContainer.value.clientWidth, threeContainer.value.clientHeight);

    adjustCamera();
};

// 🔵 Monté dans le DOM
onMounted(() => {
    init();
    adjustCamera();
    window.addEventListener("click", handleClick);
    window.addEventListener("mousemove", onMouseMove);
    window.addEventListener("resize", onResize);
});

// 🔴 Nettoyage lors du démontage
onBeforeUnmount(() => {
    cancelAnimationFrame(animationFrameId);
    window.removeEventListener("click", handleClick);
    window.removeEventListener("mousemove", onMouseMove);
    window.removeEventListener("resize", onResize);
});
</script>
