var _user = JSON.parse(localStorage.getItem("user"));
var app = angular.module('User_ChuyenMuc',[]);
app.controller("ChuyenMucCtrl",function($scope,$http){

    $scope.MaCM=JSON.parse(localStorage.getItem('chuyenmuc'));
    
    $scope.listSanPham;
    $scope.page = 1;
    $scope.pageSize = 8;
    
    $scope.GetSP=function(){
        $http({
            method:'POST',
             headers: { "Authorization": 'Bearer ' + _user.token },
            data:{
                page:$scope.page,
                pageSize:$scope.pageSize,
                MaChuyenMuc:$scope.MaCM,
            },
            url:'https://localhost:44395/api/SanPham/search_ChuyenMuc',
        }).then(function(response){
            $scope.listSanPham=response.data.data;
            console.log($scope.listSanPham)
        })
    }
    $scope.GetSP();


    $scope.listSanphamNew;
    $scope.Get_SP_New= function () {
        $http({
        method: 'POST',
        data: { page:1, pageSize:5 },
        url: 'https://localhost:44395/api/SanPham/Search_SP_New',
        }).then(function (response) {
        $scope.listSanphamNew = response.data.data;
        // $scope.totalItems = response.data.totalItems;
        // console.log($scope.listSanphamNew )
        //   $scope.PageIndex(response.data.totalItems)
        });
    };
    $scope.Get_SP_New();


    $scope.product=function(x){
        localStorage.setItem('contentsmall',x.maSanPham)
        window.location='chitietsanpham.html'
        // console.log(JSON.parse(localStorage.getItem('contentsmall')))
    }




    $scope.chuyenmuc_aosomi = function(){
        localStorage.setItem('chuyenmuc',1);
        window.location='aonam.html'
    }
    $scope.chuyenmuc_aothun = function(){
        localStorage.setItem('chuyenmuc',2);
        window.location='aonam.html'
    }
    $scope.chuyenmuc_aopolo = function(){
        localStorage.setItem('chuyenmuc',3);
        window.location='aonam.html'
    }
    $scope.chuyenmuc_aokhoac = function(){
        localStorage.setItem('chuyenmuc',4);
        window.location='aonam.html'
    }
    $scope.chuyenmuc_aolen = function(){
        localStorage.setItem('chuyenmuc',5);
        window.location='aonam.html'
    }
    $scope.chuyenmuc_aovest = function(){
        localStorage.setItem('chuyenmuc',6);
        window.location='aonam.html'
    }
    $scope.chuyenmuc_aoghile = function(){
        localStorage.setItem('chuyenmuc',7);
        window.location='aonam.html'
    }
   
})