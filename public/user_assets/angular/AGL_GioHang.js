var app = angular.module('GioHang',[]);
app.controller("GioHangController",function($scope,$http){


    $scope.listItemBuy = localStorage.getItem('listProduct')? JSON.parse(localStorage.getItem('listProduct')):[]
    console.log($scope.listItemBuy)
   
    $scope.tinhTongTien = function() {
        var tongTien = 0;
        angular.forEach($scope.listItemBuy, function(item) {
            tongTien += item.amount * item.price;
        });
        return tongTien;
    };
    $scope.tinhTongTien();
   
    $scope.xoaSanPham = function(maSP) {
        for (var i = 0; i < $scope.listItemBuy.length; i++) {
            if ($scope.listItemBuy[i].maSP === maSP) {
                $scope.listItemBuy.splice(i, 1);
                localStorage.setItem('listProduct', JSON.stringify($scope.listItemBuy));
                break;
            }
        }
    };
    
    $scope.tangsl = function(index) {
        var listProductLocal = JSON.parse(localStorage.getItem('listProduct')) || [];
        if (listProductLocal[index]) {
            listProductLocal[index].amount++;
            localStorage.setItem('listProduct', JSON.stringify(listProductLocal));
            $scope.listItemBuy = listProductLocal; // Cập nhật lại scope
            $scope.getListCTHSB();
        }
    };

    $scope.giamsl = function(index) {
        var listProductLocal = JSON.parse(localStorage.getItem('listProduct')) || [];
        if (listProductLocal[index] && listProductLocal[index].amount>1) {
            listProductLocal[index].amount--;
            localStorage.setItem('listProduct', JSON.stringify(listProductLocal));
            $scope.listItemBuy = listProductLocal; // Cập nhật lại scope
        }
    };

    // console.log( $scope.listItemBuy)
    $scope.getListCTHSB=function()
    {
        $scope.listCTHDB=[]
        $scope.listItemBuy.forEach(x => {
            var obj={
               
                "maSanPham": x.maSP,
                "soLuong": x.amount,
                "tongGia": x.amount*x.price,
                "giamGia": "không có",
                "status": 0
            }
            $scope.listCTHDB.push(obj)
        });
    }
    $scope.getListCTHSB()


    $scope.CreateHD=function(){
        console.log($scope.tenKH)
        console.log($scope.sdt)
        console.log($scope.diaChi)
        console.log($scope.tongtien)
        $http({
            method: 'POST',
            //   headers: { "Authorization": 'Bearer ' + _user.token },
            data: {
                tenKH:$scope.tenKH,
                diaChi:$scope.diaChi,
                sdt:$scope.sdt,  

                trangThai:true,
                ngayTao:new Date(),
                diaChiGiaoHang:$scope.diaChi,
                tongGia:$scope.tinhTongTien(),
                list_json_ChiTietHD:$scope.listCTHDB
                
            },
            url:  current_url+'dathang/Create',
          })
          .then(function (response) {  
            console.log(response)
            alert("Thêm đơn hàng thành công")
            localStorage.removeItem('listProduct');
            // window.location.reload();
        });
    }

    
})

