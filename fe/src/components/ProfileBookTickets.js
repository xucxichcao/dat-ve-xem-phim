import React, { useState } from "react";
import { useSelector } from "react-redux";
import format from "date-format";
import Table from "@material-ui/core/Table";
import TableBody from "@material-ui/core/TableBody";
import TableCell from "@material-ui/core/TableCell";
import TableContainer from "@material-ui/core/TableContainer";
import TableHead from "@material-ui/core/TableHead";
import TableRow from "@material-ui/core/TableRow";
import Paper from "@material-ui/core/Paper";

import { Button, Grid } from "@material-ui/core";

function ProfileBookTickets() {
  // const classes = useStyles();
  const profileUser = useSelector((state) => {
    return state?.profile?.profileUser;
  });

  // const profileUser1 = {
  //   taiKhoan: "caotrongnghia",
  //   hoTen: "Cao Trọng Nghĩa",
  //   email: "18521138@gm.uit.edu.vn",
  //   soDT: "0364857809",
  //   loaiNguoiDung: "QuanTri",
  //   maNhom: "GP01",
  //   danhSachLichChieu: [
  //     {
  //       maLichChieu: 4,
  //       maRap: 1,
  //       ngayChieuGioChieu: "2021-11-12 17:56:03",
  //       tenRap: "Rạp 1",
  //       maChieu: 3,
  //       thoiLuong: 0,
  //       diaChi: "L5-Vincom 3/2, 3C Đường 3/2, Q.10",
  //       tenCumRap: "BHD Star Cineplex - 3/2",
  //       tenPhim: "in culpa vel",
  //       hinhAnh: "http://localhost:8888/hinhanh/movie.jpg",
  //       danhSachVe: [
  //         {
  //           maVe: 1,
  //           maLichChieu: 4,
  //           maGhe: 119,
  //           tenGhe: "119",
  //           giaVe: 90000,
  //           loaiGhe: "Vip",
  //         },
  //         {
  //           maVe: 2,
  //           maLichChieu: 4,
  //           maGhe: 120,
  //           tenGhe: "120",
  //           giaVe: 90000,
  //           loaiGhe: "Vip",
  //         },
  //         {
  //           maVe: 3,
  //           maLichChieu: 4,
  //           maGhe: 121,
  //           tenGhe: "121",
  //           giaVe: 90000,
  //           loaiGhe: "Vip",
  //         },
  //         {
  //           maVe: 4,
  //           maLichChieu: 4,
  //           maGhe: 48,
  //           tenGhe: "48",
  //           giaVe: 75000,
  //           loaiGhe: "Thuong",
  //         },
  //         {
  //           maVe: 5,
  //           maLichChieu: 4,
  //           maGhe: 107,
  //           tenGhe: "107",
  //           giaVe: 90000,
  //           loaiGhe: "Vip",
  //         },
  //         {
  //           maVe: 6,
  //           maLichChieu: 4,
  //           maGhe: 122,
  //           tenGhe: "122",
  //           giaVe: 90000,
  //           loaiGhe: "Vip",
  //         },
  //       ],
  //     },
  //     {
  //       maLichChieu: 1,
  //       maRap: 11,
  //       ngayChieuGioChieu: "2021-11-12 17:56:03",
  //       tenRap: "Rạp 1",
  //       maChieu: 7,
  //       thoiLuong: 0,
  //       diaChi: "L3-Bitexco Icon 68, 2 Hải Triều, Q.1",
  //       tenCumRap: "BHD Star Cineplex - Bitexco",
  //       tenPhim: "sed ex totam",
  //       hinhAnh: "http://localhost:8888/hinhanh/movie.jpg",
  //       danhSachVe: [
  //         {
  //           maVe: 7,
  //           maLichChieu: 1,
  //           maGhe: 120,
  //           tenGhe: "120",
  //           giaVe: 90000,
  //           loaiGhe: "Vip",
  //         },
  //         {
  //           maVe: 8,
  //           maLichChieu: 1,
  //           maGhe: 121,
  //           tenGhe: "121",
  //           giaVe: 90000,
  //           loaiGhe: "Vip",
  //         },
  //       ],
  //     },
  //     {
  //       maLichChieu: 2,
  //       maRap: 1,
  //       ngayChieuGioChieu: "2021-11-12 17:56:03",
  //       tenRap: "Rạp 1",
  //       maChieu: 1,
  //       thoiLuong: 0,
  //       diaChi: "L5-Vincom 3/2, 3C Đường 3/2, Q.10",
  //       tenCumRap: "BHD Star Cineplex - 3/2",
  //       tenPhim: "commodi officiis maxime",
  //       hinhAnh: "http://localhost:8888/hinhanh/movie.jpg",
  //       danhSachVe: [
  //         {
  //           maVe: 9,
  //           maLichChieu: 2,
  //           maGhe: 120,
  //           tenGhe: "120",
  //           giaVe: 90000,
  //           loaiGhe: "Vip",
  //         },
  //         {
  //           maVe: 10,
  //           maLichChieu: 2,
  //           maGhe: 121,
  //           tenGhe: "121",
  //           giaVe: 90000,
  //           loaiGhe: "Vip",
  //         },
  //         {
  //           maVe: 11,
  //           maLichChieu: 2,
  //           maGhe: 119,
  //           tenGhe: "119",
  //           giaVe: 90000,
  //           loaiGhe: "Vip",
  //         },
  //       ],
  //     },
  //   ],
  // };

  const [danhSachVe, setDanhSachVe] = useState();

  return (
    <>
      <h1 style={{ textAlign: "center" }}>Lịch sử đặt vé</h1>
      <Grid container spacing={2} style={{ paddingTop: "1em" }}>
        <Grid item lg={4} sm={8} xs={12}>
          {profileUser?.danhSachLichChieu?.map((lichChieu) => {
            return (
              <div
                style={{
                  display: "flex",
                  padding: "1em",
                  background: "white",
                  boxShadow: " rgba(149, 157, 165, 0.2) 0px 8px 24px",
                  marginTop: "1em",
                  border: "1px solid #00000017",
                }}
              >
                <img width="50%" src={lichChieu.hinhAnh} alt="hinhAnh" />
                <div
                  style={{
                    display: "flex",
                    flexDirection: "column",
                    marginLeft: "1em",
                    justifyContent: "space-between",
                  }}
                >
                  <div>
                    <h1>{lichChieu?.tenPhim}</h1>
                    <p>
                      <span style={{ fontWeight: "bold" }}>
                        Ngày chiếu - giờ chiếu:
                      </span>
                      {format(
                        "dd/MM/yyyy - hh:mm",
                        new Date(lichChieu?.ngayChieuGioChieu)
                      )}
                    </p>
                    <p>
                      <span style={{ fontWeight: "bold" }}>Tên rạp:</span>{" "}
                      {lichChieu?.tenCumRap}
                    </p>
                    <p>
                      <span style={{ fontWeight: "bold" }}>Địa chỉ:</span>{" "}
                      {lichChieu?.diaChi}
                    </p>
                  </div>
                  <div
                    style={{
                      display: "flex",
                      alignItems: "center",
                      justifyContent: "center",
                    }}
                  >
                    <Button
                      style={{ width: "50%" }}
                      variant="contained"
                      color="primary"
                      onClick={() => {
                        setDanhSachVe(lichChieu?.danhSachVe);
                      }}
                    >
                      Xem chi tiết
                    </Button>
                  </div>
                </div>
              </div>
            );
          })}
        </Grid>
        <Grid item lg={8} sm={4} xs={12}>
          <TableContainer component={Paper} style={{ marginTop: "1em" }}>
            <Table aria-label="simple table">
              <TableHead>
                <TableRow>
                  <TableCell align="left">Ghế</TableCell>
                  <TableCell align="left">Ghế hạng</TableCell>
                  <TableCell align="left">Giá</TableCell>
                </TableRow>
              </TableHead>
              <TableBody>
                {danhSachVe?.map((ve) => {
                  return (
                    <TableRow>
                      <TableCell align="left">{ve?.tenGhe}</TableCell>
                      <TableCell align="left">{ve?.loaiGhe}</TableCell>
                      <TableCell align="left">{ve?.giaVe}</TableCell>
                    </TableRow>
                  );
                })}
              </TableBody>
            </Table>
          </TableContainer>
        </Grid>
      </Grid>
    </>
  );
}

export default ProfileBookTickets;
