$(function() {

<<<<<<< HEAD

// page accueil
=======
  //****************** début page accueil **********************************
>>>>>>> master

  $('#select_categorie').change(function() {

    $.post("./inc/api.php", $('#form_filtres_gauche').serialize()).done(function(data) {

<<<<<<< HEAD

	



});
=======
      $('#annonces').empty();
      data = JSON.parse(data);
      for (var i = 0; i < data.length; i++) {
        $('#annonces').append(
          '<div class = "panel panel-default" id_annonce ="' +
          data[i]['id_annonce'] + '"><h4 class = "text-center" >' + data[i][
            'titre'
          ] +
          '</h3><div class = "panel-body"><img src =""                alt = ""><span>' +
          data[i]['description_courte'] + '</span><br><span>' + data[i]['pseudo'] +
          ' ' + data[i]['note'] + '</span><span>' + data[i]['prix'] + '</span></div>'
        );
      };

    });


  });

  $('#select_membre').change(function() {

    $.post("./inc/api.php", $('#form_filtres_gauche').serialize()).done(function(data) {

      $('#annonces').empty();
      data = JSON.parse(data);
      for (var i = 0; i < data.length; i++) {
        $('#annonces').append(
          '<div class = "panel panel-default" id_annonce ="' +
          data[i]['id_annonce'] + '"><h4 class = "text-center" >' + data[i][
            'titre'
          ] +
          '</h3><div class = "panel-body"><img src =""                alt = ""><span>' +
          data[i]['description_courte'] + '</span><br><span>' + data[i]['pseudo'] +
          ' ' + data[i]['note'] + '</span><span>' + data[i]['prix'] + '</span></div>'
        );
      };

    });


  });

// ************************** fin page accueil ***************************************
>>>>>>> master

})
