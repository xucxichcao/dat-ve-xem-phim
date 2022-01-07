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

  const [danhSachVe, setDanhSachVe] = useState();

  const toCurrency = value => {
    if (typeof value !== "number") {
        return value;
      }
      var formatter = new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND"
      });
      return formatter.format(value);
    };

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
                    <p style={{ margin: "8px 0px"}}>
                      <span style={{ fontWeight: "bold" }}>
                        Suất:
                      </span>
                      {format(
                        "dd/MM/yyyy - hh:mm",
                        new Date(lichChieu?.ngayChieuGioChieu)
                      )}
                    </p>
                    <p style={{ margin: "8px 0px"}}>
                      <span style={{ fontWeight: "bold" }}>Tên rạp:</span>{" "}
                      {lichChieu?.tenCumRap}
                    </p>
                    <p style={{ margin: "8px 0px"}}>
                      <span style={{ fontWeight: "bold" }}>Địa chỉ:</span>{" "}
                      {lichChieu?.diaChi}
                    </p>
                    <p style={{ margin: "8px 0px"}}>
                      <span style={{ fontWeight: "bold"}}>Mô tả:</span>{" "}
                      {lichChieu?.moTa}
                    </p>
                  </div>
                  <div
                    style={{
                      display: "flex",
                      alignItems: "center",
                      justifyContent: "flex-end",
                    }}
                  >
                    <Button
                      style={{ }}
                      variant="contained"
                      color="primary"
                      onClick={() => {
                        setDanhSachVe(lichChieu?.danhSachVe);
                      }}
                    >
                      Xem vé đã đặt
                    </Button>
                  </div>
                </div>
              </div>
            );
          })}
        </Grid>
        <Grid item lg={8} sm={4} xs={12}>
          <TableContainer component={Paper} style={{ marginTop: "1em", position: "sticky", top: "6em", }}>
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
                      <TableCell align="left">{toCurrency(ve?.giaVe)}</TableCell>
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
