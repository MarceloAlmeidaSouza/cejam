(function(w,d){
  var ta = d.getElementById('table-autor');
  var tc = d.getElementById('table-categoria');
  var tn = d.getElementById('table-noticia');
  function deleteItem(ev){
    if(ev.target instanceof HTMLButtonElement && ev.target.textContent == "Excluir"){
      ev.preventDefault();
      if(!confirm("Deseja excluir este registro?")){
        return;
      }
      var url = ev.target.parentElement.href;
      var token = d.getElementsByName("_token")[0].value;

      $.ajax({
          url: url,
          type: 'DELETE',
          data: {},
          headers:{'X-CSRF-TOKEN':token},
          success: function(result) {
              w.location.href = location.pathname.split("/")[1];
          },
          error: function(request,msg,error) {
            alert("Ops, something went wrong");
          }
      });
    }
  }
  ta && ta.addEventListener("click",deleteItem);
  tc && tc.addEventListener("click",deleteItem);
  tn && tn.addEventListener("click",deleteItem);

})(window,document)
