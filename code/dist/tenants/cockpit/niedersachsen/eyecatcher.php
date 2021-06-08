<h3 class="collapsed" data-toggle="collapse" data-target=".eyecatcher"><i class="far fa-eye"></i> Störer</h3>
<div class="eyecatcher list-group-item list-group-item-action flex-column align-items-start collapse">
    <div class="mb-1 list-group-item-content">
        <div class="">
            <select class="form-control" id="eyecatchertemplate">
                <option value="">Vorlage wählen</option>
                <option value="custom">Text selbt eingeben</option>
                <optgroup label="Vorlagen">
                    <option value="niedersachsen/datum.png">12.9 und 26.9</option>
                    <option value="niedersachsen/alle-stimmen.png">Alle Stimmen Grün</option>
                    <option value="niedersachsen/briefwahl.png">Briefwahl jetzt!</option>
                </optgroup>
            </select>
            oder
        </div>
        <div class="d-flex align-items-lg-center">
            <textarea name="pintext" id="pintext" placeholder="Dein Text" class="form-control" data-maxlines="3"></textarea>
        </div>
        <div class="d-flex justify-content-between">
            <div class="slider">
                <small>klein</small>
                <input type="range" class="custom-range" name="eyecatchersize" id="eyecatchersize" min="50"
                    max="300" value="100">
                <small>groß</small>
            </div>
            <div>
                <span class="to-front" data-target="pin" title="Störer nach vorne">
                    <i class="fas fa-layer-group text-primary"></i>
                </span> 
            </div>
        </div>    
    </div>
</div>

<input type="hidden" name="pinX" id="pinX">
<input type="hidden" name="pinY" id="pinY">