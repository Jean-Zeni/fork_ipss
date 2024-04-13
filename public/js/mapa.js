// Initialize and add the map
let map;

async function initMap() {
 
  async function getIgrejas(){
    const igrejas = await fetch('/api/igrejas-rs', { cache: 'reload'} );
    return await igrejas.json();
  }
  
  var igrejas = getIgrejas();
  
  const { Map } = await google.maps.importLibrary("maps");

  igrejas.then(function(result){
    result.map(function(item){
 
      var img = item.arquivo != null ? '<img src="/storage/uploads/igreja/'+item.arquivo.id+'/'+item.arquivo.nome+'" width="100%" style="max-height:150px;object-fit:contain;margin-top:5px;margin-bottom:10px;">' : '';
      var endereco = item.endereco != null ? '<p>'+item.endereco+'</p>' : '';
      var site = item.link_site != null ? "<a href='"+item.link_site+"' class='btn btn-primary' style='border-radius:6px;' target='_blank'>Acessar Site</a>" : '';
      var icon = (item.congregacao != 1) ? '/images/icone-marcador-igrejas.png' : '/images/icone-marcador-congregacao.png';

      const conteudo =
        '<div id="content">' +
          '<h4 id="firstHeading" class="firstHeading">'+item.nome+'</h4>' +
          '<div id="bodyContent">' +
            img +
            endereco+
            site +
          "</div>" +
        "</div>";

      const modal = new google.maps.InfoWindow({
        content: conteudo,
      });

      const marcador = new google.maps.Marker({
        position: {lat: parseFloat(item.latitude), lng: parseFloat(item.longitude)},
        icon: icon,
        map: map,
      });

      marcador.addListener("click", () => {
        modal.open({
          anchor: marcador,
          map,
        });
      });
    })
  })

  map = new Map(document.getElementById("map"), {
    zoom: 7,
    center: { lat: -30.01, lng: -51.22 },
    mapId: "mapa-rs",
  });
}

initMap();