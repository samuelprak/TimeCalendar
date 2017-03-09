<div class="full-bloc starter-template">
    <h1>Accéder à un calendrier</h1>
    <p class="lead">Cet outil est à votre disposition afin d'accéder à votre calendrier universitaire. Il peut aussi générer un lien ICalendar afin d'importer votre calendrier dans votre application de calendrier préférée (Outlook, Google Calendar, iCal ...).</p>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">
                <span class="blocEts">
                    <h3>1. Sélectionner votre établissement</h3>
                    <div class="form-group">
                        <select class="select-app form-control" data-width="100%" id="university" data-live-search="true" title="Choisissez dans la liste...">
                        </select>
                    </div>
                </span>
                <span class="blocNiv" style="display:none;">
                    <h3>2. Sélectionner votre niveau d'études</h3>
                    <div class="form-group">
                        <select class="select-app form-control" data-width="100%" id="grade" data-live-search="true" title="Choisissez dans la liste...">
                        </select>
                    </div>
                </span>
                <span class="blocGrp" style="display:none;">
                    <h3>3. Sélectionner vos groupes</h3>
                    <div class="form-group">
                        <select class="select-app form-control" data-width="100%" id="group" data-live-search="true" title="Choisissez dans la liste..." multiple>
                        </select>
                    </div>
                </span>
            </div>
            <div class="col-md-12">
                <button type="submit" id="submitformcal" class="btn btn-lg btn-primary" style="display:none;">Accéder au calendrier</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(function() {

        actualUniversity = "";
        actualGrade = "";
        
        function renderSelect(){
            // Render selectpicker
            $('.select-app').selectpicker('destroy');
            $('.select-app').selectpicker({});
        }

        function refreshUniversityList(){
            getUniversityList(function(university){
                var $el = $("#university");
                $el.empty();
                $.each(university, function(key, value){
                  $el.append($("<option></option>")
                    .attr("value", value.code).text(value.name));
              });
                renderSelect();
                $(".blocNiv").slideUp(400);
                $(".blocGrp").slideUp(400);
                $("#submitformcal").slideUp(400);
            });
        }

        function refreshGradeList(ucode){
            getGradeList(ucode, function(grade){
                var $el = $("#grade");
                $el.empty();
                $.each(grade, function(key,value){
                  $el.append($("<option></option>")
                    .attr("value", value.id).text(value.name));
                });
                renderSelect();
                $(".blocNiv").slideDown(400);
                $(".blocGrp").slideUp(400);
                $("#submitformcal").slideUp(400);
            });
        }

        function refreshGroupList(groupid){
            getGroupList(groupid, function(group){
                var $el = $("#group");
                $el.empty();
                $.each(group, function(key,value){
                  $el.append($("<option></option>")
                    .attr("value", value.id).text(value.name));
                });
                renderSelect();
                $(".blocNiv").slideDown(400);
                $(".blocGrp").slideDown(400);
                $("#submitformcal").slideDown(400);
            });
        }

        $("#university").change(function(){
            var val = $('#university').val();
            actualUniversity = val;
            refreshGradeList(actualUniversity);
        });

        $("#grade").change(function(){
            var val = $('#grade').val();
            actualGrade = val;
            refreshGroupList(actualGrade);
        });

        $("#submitformcal").click(function(){ // Access to calendar
            var groups = $("#group").val();
            var tab = groups.join();
            window.location.href = "index.php?p=calendar&university=" + actualUniversity + "&grade=" + actualGrade + "&group=" + tab;
        });


        refreshUniversityList();


    });




</script>

