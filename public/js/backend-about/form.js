(function () {
    app.controller('BackendAboutController', function ($scope,$http){
        $http.get('/about/ListAbout').then(function(response){
            $scope.datalistabout = response.data.data;
            if(response.data.data.length > 0){
                $("#about_us_text_header").text($scope.datalistabout[0].about_us_text_header) ;
                document.getElementById("about_us_content_1_header").value = $scope.datalistabout[0].about_us_content_1_header ;
                document.getElementById("about_us_content_1_text_1").value = $scope.datalistabout[0].about_us_content_1_text_1 ;
                document.getElementById("about_us_content_1_text_2").value = $scope.datalistabout[0].about_us_content_1_text_2 ;
                document.getElementById("about_us_content_1_text_3").value = $scope.datalistabout[0].about_us_content_1_text_3 ;
                document.getElementById("about_us_content_1_text_4").value = $scope.datalistabout[0].about_us_content_1_text_4 ;
                document.getElementById("about_us_content_1_text_5").value = $scope.datalistabout[0].about_us_content_1_text_5 ;
                document.getElementById("about_us_content_1_pic_url").src= '/storage/about/1' +'/'+$scope.datalistabout[0].about_us_content_1_pic_url;

                document.getElementById("about_us_content_2_header").value = $scope.datalistabout[0].about_us_content_2_header ;
                document.getElementById("about_us_content_2_text_1").value = $scope.datalistabout[0].about_us_content_2_text_1 ;
                document.getElementById("about_us_content_2_text_2").value = $scope.datalistabout[0].about_us_content_2_text_2 ;
                document.getElementById("about_us_content_2_text_3").value = $scope.datalistabout[0].about_us_content_2_text_3 ;
                document.getElementById("about_us_content_2_text_4").value = $scope.datalistabout[0].about_us_content_2_text_4 ;
                document.getElementById("about_us_content_2_text_5").value = $scope.datalistabout[0].about_us_content_2_text_5 ;
                document.getElementById("about_us_content_2_pic_url").src= '/storage/about/2' +'/'+$scope.datalistabout[0].about_us_content_2_pic_url;
            }
        });
    });

    app.controller('ElementsController', function ($scope,$http){
        $http.get('/elements/Listmemu').then(function(response){
            $scope.datalistmemu = response.data.data;
        });
        $http.get('/elements/ListContactUs').then(function(response){
            $scope.datalistcontactus = response.data.data;
        });
    });
})();

function preview_image_add_1_pic(event)
{
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('about_us_content_1_pic_url');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function preview_image_add_2_pic(event)
{
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('about_us_content_2_pic_url');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
