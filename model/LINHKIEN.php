<?php
   class LinhKien{

    function __construct($maLinhKien,$tenLinhKien,$giaTien,$soLuong,$giaTienKhuyenMai,$moTa,$hinhAnh,$ngayCapNhat,$maLoaiLinhKien){
        $this->maLinhKien=$maLinhKien;
        $this->tenLinhKien=$tenLinhKien;
        $this->giaTien=$giaTien;
        $this->soLuong=$soLuong;
        $this->giaTienKhuyenMai=$giaTienKhuyenMai;
        $this->moTa=$moTa;
        $this->hinhAnh=$hinhAnh;
        $this->ngayCapNhat=$ngayCapNhat;
        $this->maLoaiLinhKien=$maLoaiLinhKien;
    }

    function loadLinhKien(){
        $array=array();
        $db=new Database();
        $connect=$db->getDB();
        $query="select * from linhkien";
            $data=mysqli_query($connect,$query);
    
            $array=array();
        while($row = mysqli_fetch_assoc($data)){
          array_push($array,new LinhKien($row['MALINHKIEN'],$row['TENLINHKIEN'],$row['GIATIEN'],$row['SOLUONG'],$row['GIATIENKHUYENMAI'],$row['MOTA'],$row['HINHANH'],$row['NGAYCAPNHAT'],$row['MALLINHKIEN']));
        }
        return $array;

    }

    function addLinhKien($linhKien){
        $db=new Database();
        $connect=$db->getDB();
$query="Insert into linhkien (`TENLINHKIEN`, `GIATIEN`,`SOLUONG`, `GIATIENKHUYENMAI`,`MOTA`, `HINHANH`,`NGAYCAPNHAT`, `MALLINHKIEN`) values ('$linhKien->tenLinhKien',$linhKien->giaTien,$linhKien->soLuong,$linhKien->giaTienKhuyenMai,'$linhKien->moTa','$linhKien->hinhAnh','$linhKien->ngayCapNhat','$linhKien->maLoaiLinhKien')";
    $result=mysqli_query($connect,$query);
    if($result)
    return 1;
    else
    return 0;
    }

    function delLinhKien($malinhkien){
        $db=new Database();
        $connect=$db->getDB();
        $query="delete from linhkien where MALINHKIEN=$malinhkien";
        $result=mysqli_query($connect,$query);
        if($result)
        return 1;
        return 0;
    }

}
?>