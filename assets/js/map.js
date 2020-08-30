//Criação do mapa
var map = L.map('map').setView([-29.75, -51.15], 13);

L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=Ju8MrAf62sVjpg6Mo1v0', {
	attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap</a>',
	noWrap: true,
	minZoom: 5
}).addTo(map);

var bounds = L.latLngBounds(L.latLng(-90, -180), L.latLng(90, 180));
map.setMaxBounds(bounds);

//Controle de rotas
var control = L.Routing.control({
	lineOptions: {
		addWaypoints: false
	},
	waypoints: [
		L.latLng(null),
		L.latLng(null)
	],
	//geocoder: L.Control.Geocoder.bing("AncVyGR-GE87ziR8WbbLbstfmGIa7mDVfaCoZ77tr0_26gp3zRzMEhIzBV7v8lq-"),
	geocoder: L.Control.Geocoder.nominatim(),
}).addTo(map);

//Geolocalização
function onLocationFound(e) {
	var radius = e.accuracy / 2;
	L.circle(e.latlng, radius).addTo(map);
}

map.on('locationfound', onLocationFound);
map.locate({setView: true, maxZoom: 16});

var detalherota;
var modalidadeselecionada = defaultmodalidade;
var summary;
var valortotal;
var origem_latlng;
var destino_latlng;
var rota;

//Teste
control.on('routesfound', function(e) {
   rota = e;
	var popup = $("#popupvalor");
	popup.fadeIn();
	var routes = e.routes;
	summary = routes[0].summary;
	origem_latlng = routes[0].coordinates[0].lat + "," + routes[0].coordinates[0].lng;
	destino_latlng = routes[0].coordinates[routes[0].coordinates.length - 1].lat + "," + routes[0].coordinates[routes[0].coordinates.length - 1].lng;
	valortotal = (((summary.totalDistance / 1000) * precos[modalidadeselecionada-1].taxakm) + Math.round(summary.totalTime % 3600 / 60) * precos[modalidadeselecionada-1].taxamin).toFixed(2);
	if (parseFloat(valortotal) < parseFloat(precos[modalidadeselecionada-1].valormin)) {valortotal = precos[modalidadeselecionada-1].valormin;}
	document.getElementById("valor").innerHTML = valortotal;
	document.getElementById("tempo").innerHTML = Math.round(summary.totalTime % 3600 / 60);
	document.getElementById("distancia").innerHTML = Math.round((summary.totalDistance / 1000) * 10) / 10;
	if (modalidadeselecionada == 1 || modalidadeselecionada == 7 || modalidadeselecionada == 8 || modalidadeselecionada == 9) {
		document.getElementById("textomodalidade").innerHTML = "Modalidade: " + precos[modalidadeselecionada-1].nome;
	}else if(modalidadeselecionada == 6){
		document.getElementById("textomodalidade").innerHTML = "Deficiente físico";
	}else if(modalidadeselecionada == 10){
		document.getElementById("textomodalidade").innerHTML = "Deficiente múltiplo";
	}else{
		document.getElementById("textomodalidade").innerHTML = precos[modalidadeselecionada-1].nome;
	}
	detalherota = [e.waypoints[0].name, e.waypoints[1].name];
});

function selecao(){
	var x = document.getElementById("modalidade").value;
	if (x == "default") {
		modalidadeselecionada = defaultmodalidade;
	}else{
		modalidadeselecionada = x;
	}
	valortotal = (((summary.totalDistance / 1000) * precos[modalidadeselecionada-1].taxakm) + Math.round(summary.totalTime % 3600 / 60) * precos[modalidadeselecionada-1].taxamin).toFixed(2);
   	if (parseFloat(valortotal) < parseFloat(precos[modalidadeselecionada-1].valormin)) {valortotal = precos[modalidadeselecionada-1].valormin;}
   	document.getElementById("valor").innerHTML = valortotal;
   	if (modalidadeselecionada == 1 || modalidadeselecionada == 7 || modalidadeselecionada == 8 || modalidadeselecionada == 9) {
   		document.getElementById("textomodalidade").innerHTML = "Modalidade: " + precos[modalidadeselecionada-1].nome;
   	}else if(modalidadeselecionada == 6){
   		document.getElementById("textomodalidade").innerHTML = "Deficiente físico";
   	}else if(modalidadeselecionada == 10){
   		document.getElementById("textomodalidade").innerHTML = "Deficiente múltiplo";
   	}else{
   		document.getElementById("textomodalidade").innerHTML = precos[modalidadeselecionada-1].nome;
   	}
}

function submit(){
   if (detalherota[0] == "" || detalherota[1] == "") {
      detalherota[0] = rota.waypoints[0].name;
      detalherota[1] = rota.waypoints[1].name;
   }
	var dataarray = {valortotal: valortotal, modalidade: modalidadeselecionada-1, origem: detalherota[0], origem_latlng: origem_latlng, destino: detalherota[1], destino_latlng: destino_latlng};
	$.post("http://177.22.176.32:2188/rotae/viagem/confirmar", {data: dataarray}, function(msg){
		document.getElementById("msgcontainer").innerHTML = '<div class="row"><div class="col"></div><div class="col-md-auto caixa" id="popup" style="pointer-events: auto;"><div class="row" style="pointer-events: auto;"><div class="col-4 colunaesq"><div class="roundbutton md2"></div><div class="text-center" id="textomodalidade">Viagem confirmada!</div></div><div class="col-8"><select class="form-control" style="margin-top: 20px" disabled><option value="default" hidden>Outra modalidade</option><option value="5">Deficiente intelectual</option></select><span class="texto"><p class="texto"><b>Total:</b> R$<span id="v">'+ valortotal +'</span></p><p class="texto"><b>Pagamento:</b> Dinheiro</p><p class="texto">Aguarde na origem.</p></span></div></div><div class="row" style="margin-top: 10px; pointer-events: auto;"><div class="col"><button type="button" class="btn btn-dark btn-block" disabled>Viagem confirmada</button></div></div></div><div class="col"></div></div>';
	});
}