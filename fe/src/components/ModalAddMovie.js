import React, { useState } from "react";
import { makeStyles } from "@material-ui/core/styles";
import Modal from "@material-ui/core/Modal";
import Backdrop from "@material-ui/core/Backdrop";
import Fade from "@material-ui/core/Fade";
import { useDispatch } from "react-redux";
import {
  Button,
  Checkbox,
  FormControlLabel,
  Grid,
  TextField,
} from "@material-ui/core";
import { addNewMovieAction } from "../store/actions/adminAction";

const useStyles = makeStyles((theme) => ({
  modal: {
    display: "flex",
    alignItems: "center",
    justifyContent: "center",
  },
  paper: {
    backgroundColor: theme.palette.background.paper,
    border: "2px solid #000",
    boxShadow: theme.shadows[5],
    padding: theme.spacing(2, 4, 3),
    width: "400px",
  },
}));

export default function ModalAddMovie(props) {
  const open = props?.open;
  const handleClose = props?.handleClose;
  const maNhom = props?.maNhom;
  const soTrang = props?.soTrang;
  const soPhanTuTrenTrang = props?.soPhanTuTrenTrang;
  const dispatch = useDispatch();
  const classes = useStyles();

  const [movie, setMovie] = useState({
    tenPhim: "",
    trailer: "",
    hinhAnh: "",
    moTa: "",
    maNhom: "GP01",
    ngayKhoiChieu: "",
    danhGia: "",
    thoiLuong: "",
    dangChieu: "0",
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    if (name === "hinhAnh") {
      setMovie({
        ...movie,
        [name]: e.target.files[0],
      });
    } else if (name === "dangChieu") {
      setMovie({
        ...movie,
        [name]: e.target.checked ? 1 : 0,
      });
    } else if (name === "ngayKhoiChieu") {
      var splitted = value.split("/");
      setMovie({
        ...movie,
        [name]: splitted[2] + "/" + splitted[1] + "/" + splitted[0],
      });
    } else {
      setMovie({
        ...movie,
        [name]: value,
      });
    }
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    var form_data = new FormData();
    for (var key in movie) {
      form_data.append(key, movie[key]);
    }
    if (
      movie.tenPhim !== "" &&
      movie.trailer !== "" &&
      movie.hinhAnh !== "" &&
      movie.moTa !== "" &&
      movie.ngayKhoiChieu !== "" &&
      movie.danhGia !== "" &&
      movie.thoiLuong !== ""
    ) {
      dispatch(
        addNewMovieAction(form_data, maNhom, soTrang, soPhanTuTrenTrang)
      );
    } else {
      alert("thêm phim thất bại");
    }
  };

  return (
    <div>
      <Modal
        aria-labelledby="transition-modal-title"
        aria-describedby="transition-modal-description"
        className={classes.modal}
        open={open}
        onClose={handleClose}
        closeAfterTransition
        BackdropComponent={Backdrop}
        BackdropProps={{
          timeout: 500,
        }}
      >
        <Fade in={open}>
          <form onSubmit={handleSubmit} className={classes.paper} noValidate>
            <Grid container spacing={2}>
              <Grid item xs={12}>
                <TextField
                  className={classes.textField}
                  autoComplete="tenPhim"
                  name="tenPhim"
                  variant="outlined"
                  required
                  label="Tên phim"
                  autoFocus
                  fullWidth
                  onChange={handleChange}
                />
              </Grid>
              <Grid item xs={12}>
                <TextField
                  className={classes.textField}
                  autoComplete="trailer"
                  name="trailer"
                  variant="outlined"
                  required
                  label="Trailer"
                  fullWidth
                  onChange={handleChange}
                />
              </Grid>
              <Grid item xs={12}>
                <FormControlLabel
                  style={{ marginLeft: "0px" }}
                  control={
                    <Checkbox
                      checked={movie.dangChieu}
                      name="dangChieu"
                      onChange={handleChange}
                    />
                  }
                  label="Đang chiếu?"
                  labelPlacement="start"
                />
              </Grid>
              <Grid item xs={12}>
                <TextField
                  className={classes.textField}
                  autoComplete="hinhAnh"
                  name="hinhAnh"
                  variant="outlined"
                  required
                  fullWidth
                  onChange={handleChange}
                  type="file"
                />
              </Grid>
              <Grid item xs={12}>
                <TextField
                  className={classes.textField}
                  autoComplete="moTa"
                  name="moTa"
                  variant="outlined"
                  required
                  label="Mô tả"
                  fullWidth
                  onChange={handleChange}
                />
              </Grid>
              <Grid item xs={12}>
                <TextField
                  className={classes.textField}
                  autoComplete="ngayKhoiChieu"
                  name="ngayKhoiChieu"
                  variant="outlined"
                  required
                  label="Ngày khởi chiếu (dd/MM/yyyy)"
                  fullWidth
                  onChange={handleChange}
                />
              </Grid>
              <Grid item xs={12}>
                <TextField
                  className={classes.textField}
                  autoComplete="thoiLuong"
                  name="thoiLuong"
                  variant="outlined"
                  required
                  label="Thời lượng phim"
                  fullWidth
                  onChange={handleChange}
                />
              </Grid>
              <Grid item xs={12}>
                <TextField
                  className={classes.textField}
                  autoComplete="danhGia"
                  name="danhGia"
                  variant="outlined"
                  required
                  label="Đánh giá"
                  fullWidth
                  onChange={handleChange}
                />
              </Grid>
            </Grid>
            <Button type="submit" fullWidth>
              Thêm
            </Button>
          </form>
        </Fade>
      </Modal>
    </div>
  );
}
