<!-- DETAY MODAL -->
<div class="modal fade" id="detayModal" aria-hidden="true" aria-labelledby="detayModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detayModal">ÜRÜN DETAY</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="rapor_container">
          <div class="form-group">
            <label>ÜRÜN ADI:</label>
            <input type="text" id="adi" name="adi" disabled></input>
          </div>

          <div class="form-group">
            <label>ÜRÜN KODU:</label>
            <input type="text" id="ukod" name="ukod" disabled></input>
          </div>  

          <div class="form-group">
            <label>ÜRÜN ALIŞ FİYATI:</label>
            <input type="text" id="alisF" name="alisF" disabled></input>
          </div>

          <div class="form-group">
            <label>ÜRÜN SATIŞ FİYATI:</label>
            <input type="text" id="satisF" name="satisF" disabled></input>
          </div>

          <div class="form-group">
            <label>ALINAN ÜRÜN ADETİ:</label>
            <input type="text" id="aadet" name="aadet" disabled></input>
          </div>

          <div class="form-group">
            <label>SATILAN ÜRÜN ADETİ:</label>
            <input type="text" id="sadet" name="sadet" disabled></input>
          </div>

          <div class="form-group">
            <label>KALAN ÜRÜN ADETİ:</label>
            <input type="text" id="kalan" name="kalan" disabled></input>
          </div>

          <div class="form-group">
            <label>ALINAN FİRMALAR:</label>
            <input type="text" id="afirma" name="afirma" disabled></input>
          </div>

          <div class="form-group">
            <label>SATILAN FİRMALAR:</label>
            <input type="text" id="sfirma" name="sfirma" disabled></input>
          </div>

          <div class="form-group">
            <label>RAPOR TARİHİ:</label>
            <input type="text" id="rtarih" name="rtarih" disabled></input>
          </div>

          <div id="resim"></div>
      </div>
      <div class="modal-footer">
        <button data-html2canvas-ignore="true" class="btn btn-danger ml-5 mt-3" onclick="indir()">PDF İNDİR</button>
      </div>
    </div>
  </div>
</div>
