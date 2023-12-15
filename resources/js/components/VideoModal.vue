<template>
       <div class="modal fade" :id="'urlvideo' + guia.id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5">{{ guia.Guía }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
              <iframe :id="'videoguia' + guia.id" width="100%" height="100%"  title="" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>

  </template>
<script>
    export default {
      props: ['guia'],
      mounted(){
        const modalOpen = document.getElementById('urlvideo' + this.guia.id)
        modalOpen.addEventListener('shown.bs.modal', event => {
          console.log('Se abrio el modal ' + this.guia.id);
          document.getElementById('videoguia' + this.guia.id).src = this.guia.video;
        })

        const modalClose = document.getElementById('urlvideo' + this.guia.id)
        modalClose.addEventListener('hidden.bs.modal', event => {
          console.log('Se cerro el modal ' + this.guia.id);
          document.getElementById('videoguia' + this.guia.id).src = '';
        })

    },

  };
</script>
  