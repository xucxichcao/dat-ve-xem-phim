import React from "react";
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
import { updateMovieAction } from "../store/actions/adminAction";

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

export default function ModalMovieUpdate(props) {
  const classes = useStyles();
  const open = props?.open;
  const handleClose = props?.handleClose;
  const movie = props?.movie;
  const setMovie = props?.setMovie;
  const index = props?.index;
  const maNhom = props?.maNhom;
  const soTrang = props?.soTrang;
  const soPhanTuTrenTrang = props?.soPhanTuTrenTrang;
  const dispatch = useDispatch();

  const handlechange = (e) => {
    const { name, value } = e.target;
    setMovie({
      ...movie,
      [name]: value,
    });
  };

  const handleChangeCheckbox = (e) => {
    const { name, checked } = e.target;
    setMovie({
      ...movie,
      [name]: checked ? 1 : 0,
    });
  };

  const handlechangeHinhAnh = (e) => {
    setMovie({
      ...movie,
      hinhAnh: e.target.files[0],
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    var form_data = new FormData();
    for (var key in movie) {
      if (movie[key] !== undefined && key !== "ngayKhoiChieu")
        form_data.append(key, movie[key]);
      if (key === "ngayKhoiChieu") {
        var splitted = movie[key].split("/");
        form_data.append(
          key,
          splitted[2] + "/" + splitted[1] + "/" + splitted[0]
        );
      }
    }
    dispatch(
      updateMovieAction(form_data, index, maNhom, soTrang, soPhanTuTrenTrang)
    );
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
                  label="T??n phim"
                  autoFocus
                  fullWidth
                  value={movie.tenPhim}
                  onChange={handlechange}
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
                  autoFocus
                  fullWidth
                  value={movie.trailer}
                  onChange={handlechange}
                />
              </Grid>
              <Grid item xs={12}>
                <FormControlLabel
                  style={{ marginLeft: "0px" }}
                  control={
                    <Checkbox
                      checked={movie.dangChieu}
                      name="dangChieu"
                      onChange={handleChangeCheckbox}
                    />
                  }
                  label="??ang chi???u?"
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
                  label="H??nh ???nh"
                  autoFocus
                  fullWidth
                  // value={movie.hinhAnh}
                  onChange={handlechangeHinhAnh}
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
                  label="M?? t???"
                  autoFocus
                  fullWidth
                  value={movie.moTa}
                  onChange={handlechange}
                />
              </Grid>

              <Grid item xs={12}>
                <TextField
                  className={classes.textField}
                  autoComplete="ngayKhoiChieu"
                  name="ngayKhoiChieu"
                  variant="outlined"
                  required
                  label="Ng??y kh???i chi???u (dd/MM/yyyy)"
                  autoFocus
                  fullWidth
                  value={movie.ngayKhoiChieu}
                  onChange={handlechange}
                />
              </Grid>
              <Grid item xs={12}>
                <TextField
                  className={classes.textField}
                  autoComplete="thoiLuong"
                  name="thoiLuong"
                  variant="outlined"
                  required
                  label="Th???i l?????ng"
                  autoFocus
                  fullWidth
                  value={movie.thoiLuong}
                  onChange={handlechange}
                />
              </Grid>
              <Grid item xs={12}>
                <TextField
                  className={classes.textField}
                  autoComplete="danhGia"
                  name="danhGia"
                  variant="outlined"
                  required
                  label="????nh gi??"
                  autoFocus
                  fullWidth
                  value={movie.danhGia}
                  onChange={handlechange}
                />
              </Grid>
            </Grid>
            <Button type="submit" fullWidth>
              Update
            </Button>
          </form>
        </Fade>
      </Modal>
    </div>
  );
}
