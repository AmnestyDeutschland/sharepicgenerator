

        <h3 class="collapsed" data-toggle="collapse" data-target=".text"><i class="fas fa-text-width"></i> Text & Layout</h3>
        <div class="text collapse list-group-item list-group-item-action flex-column align-items-start">
            
            <div class="d-none">
                <label class="me-3">Layout:</label>
                 <label class="">
                    <input type="radio" class="form-check-input layout me-1" name="layout" value="area" checked>Grüne Fläche
                 </label>
            </div>

            <div class="list-group-item-content">
                <div class="d-none justify-content-end">
                    <i class="fa fa-align-left text-align me-2" data-align="left" title="linksbündig"></i>
                    <i class="fa fa-align-center text-align me-2" data-align="middle" title="zentrieren"></i>
                    <i class="fa fa-align-right text-align" data-align="end" title="rechtsbündig"></i>
                </div>
                <div class="">
                    <textarea placeholder="Haupttext" name="text" id="text" class="form-control"><?php echo getSaying('main'); ?></textarea>
                </div>
                <div class="d-none align-items-lg-center">
                    <input type="text" placeholder="Text unter der Linie" name="textafter" id="textafter" value="Veränderung beginnt hier" class="form-control showonly lines area nolines quote">
                </div>

                <div class="mb-1 mt-2">
                    <div class="d-flex justify-content-between">
                        <div class="slider">
                            <small>klein</small>
                            <input type="range" class="form-range" name="textsize" id="textsize" min="1" max="100">
                            <small>groß</small>
                        </div>
                        <div class="d-flex">
                            <div class="me-3">
                                <span class="cursor-pointer ms-3 text-primary aligncenter showonly lines nolines quote">
                                    <i class="fa fa-align-center" title="Text in Bildmitte"></i></span>
                            </div> 
                            <div>
                                <span class="to-front" data-target="text" title="Text nach vorne">
                                    <i class="fas fa-layer-group text-primary"></i>
                                </span> 
                            </div>
                        </div>
                    </div> 
                    </div>

                <div class="preferences-text">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <label class="showonly nolines">
                                <input type="checkbox" class="form-check-input" name="showclaim" id="showclaim" checked>
                                Zeige Claim
                            </label>
                            <label class="showonly lines">
                                <input type="checkbox" class="form-check-input" name="greenbehindtext" id="greenbehindtext">
                                Grün hinter Text
                            </label>
                        </div>
                        <div>
                            <label class="showonly lines nolines quote">
                                <input type="checkbox" class="form-check-input" name="graybehindtext" id="graybehindtext">
                                Farbe hinter Text
                            </label>
                        </div>
                        <div class="showonly nolines">
                            <span class="colorpicker ms-1" data-colors="#ffffff,#000000,#009571,#46962b,#E6007E,#FEEE00" data-action="nolines.draw()" data-field="#colorbehindtext" title="Farbe wechseln"></span> 
                            <input type="hidden" name="colorbehindtext" id="colorbehindtext" value="#000">
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="preferences-text showonly lines">
                <div class="d-flex justify-content-between mt-3">
                    <span class="text-primary cursor-pointer uploadiconclicker">
                        <i class="fa fa-upload"></i> Icon hochladen
                    </span>

                    <span class="text-primary cursor-pointer overlay-opener" data-target="iconoverlay">
                        <i class="fas fa-search"></i> Icon suchen
                    </span>
                </div>
                <div class="mb-1 list-group-item-content d-none iconsizeselectwrapper">
                    <select class="form-control" name="iconsize" id="iconsize">
                        <option value="1">Icon: 1 Zeile hoch</option>
                        <option value="2">Icon: 2 Zeilen hoch</option>
                        <option value="3">Icon: 3 Zeilen hoch</option>
                        <option value="0">Icon entfernen</option>
                    </select>
                </div>
            </div>
        </div>
        <input type="hidden" name="iconfile" id="iconfile">
        <input type="hidden" name="textX" id="textX">
        <input type="hidden" name="textY" id="textY">
        <input type="hidden" name="textColor" id="textColor" value="0">
        <input type="file" class="custom-file-input upload-file" id="uploadicon" accept="image/*">