import React, { useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import Modal from "@material-ui/core/Modal";
import Backdrop from "@material-ui/core/Backdrop";
import Fade from "@material-ui/core/Fade";
import {
  Container,
  InputLabel,
  makeStyles,
  withStyles,
} from "@material-ui/core";
import TextField from "@material-ui/core/TextField";
import { Button, Grid } from "@material-ui/core";
import { FormLabel } from "@material-ui/core";
import { updateProfileUserAction } from "../store/actions/profileAction";
import { deepOrange } from "@material-ui/core/colors";

const useStyles = makeStyles((theme) => ({
  table: {
    minWidth: 650,
  },
  modal: {
    display: "flex",
    alignItems: "center",
    justifyContent: "center",
    background: "none",
  },
  paper: {
    backgroundColor: theme.palette.background.paper,
    border: "2px solid #000",
    boxShadow: theme.shadows[5],
    padding: theme.spacing(2, 4, 3),
    width: "30%",
    paddingTop: "30px",
  },
  submit: {
    margin: theme.spacing(3, 0, 2),
  },
  textField: {
    width: "100%",
  },
  root: {
    display: "flex",
    "& > *": {
      margin: theme.spacing(1),
    },
  },
  orange: {
    color: theme.palette.getContrastText(deepOrange[500]),
    backgroundColor: deepOrange[500],
  },
  text: {
    marginBottom: "1em",
    marginTop: "0.2em",
    color: "black !important",
  },
  title: {
    color: "white",
    marginBottom: "1em",
  },
}));

const CssTextField = withStyles({
  root: {
    "& .MuiInputBase-input": {
      color: "white",
    },
    "& .MuiInput-underline:before": {
      borderBottomColor: "rgba(0, 0, 0, 0.87)",
    },
    "& .MuiInput-underline:hover:not(.Mui-disabled):before": {
      borderBottomColor: "white",
    },
    "& label.Mui-focused": {
      color: "white",
    },
    "& .MuiInput-underline:after": {
      borderBottomColor: "white",
    },
  },
})(TextField);

const inputStyle = { margin: "10px 0", "&>input": { color: "white" } };

function ProfileUser() {
  const classes = useStyles();
  const dispatch = useDispatch();
  const profileUser = useSelector((state) => {
    return state.profile.profileUser;
  });

  // console.log(profileUser);
  const renderThongTinTaiKhoan = () => {
    return (
      <div>
        <h1 style={{ textAlign: "center" }}>Thông tin tài khoản</h1>
        <Container>
          <Grid container>
            <Grid
              item
              md={12}
              style={{ display: "flex", flexDirection: "column" }}
            >
              <InputLabel>Tài khoản</InputLabel>
              <TextField
                className={classes.text}
                id="outlined-basic"
                variant="outlined"
                value={profileUser.taiKhoan}
                disabled
              />
              <InputLabel>Họ tên</InputLabel>
              <TextField
                className={classes.text}
                id="outlined-basic"
                variant="outlined"
                value={profileUser.hoTen}
                disabled
              />
              <InputLabel>Email</InputLabel>
              <TextField
                className={classes.text}
                id="outlined-basic"
                variant="outlined"
                value={profileUser.email}
                disabled
              />
              <InputLabel>Số điện thoại</InputLabel>
              <TextField
                className={classes.text}
                id="outlined-basic"
                variant="outlined"
                value={profileUser.soDT}
                disabled
              />
            </Grid>
            <Grid
              item
              md={12}
              style={{
                display: "flex",
                flexDirection: "column",
                justifyContent: "space",
                paddingTop: "1em",
                width: 50,
              }}
            >
              <Button
                variant="contained"
                color="secondary"
                onClick={() => {
                  changeUserDetail(
                    profileUser.matKhau,
                    profileUser.hoTen,
                    profileUser.email,
                    profileUser.soDT
                  );
                }}
              >
                Thay đổi thông tin tài khoản
              </Button>
            </Grid>
          </Grid>
        </Container>
      </div>
    );
  };

  // ------------------------ MODAL UPDATE USER --------------------

  const [user, setUser] = useState({
    matKhau: "",
    email: "",
    soDt: "",
    hoTen: "",
  });
  const changeUserDetail = (matKhau, hoTen, email, soDt) => {
    setOpen(true);
    // console.log(taiKhoan, matKhau, hoTen, email, soDT);
    setUser({
      matKhau: matKhau,
      hoTen: hoTen,
      email: email,
      soDt: soDt,
    });
  };
  const [open, setOpen] = useState(false);
  const handleClose = () => {
    setOpen(false);
  };

  const handleChange = (e) => {
    const { name, value } = e.target;
    // console.log(name, value);
    setUser({
      ...user,
      [name]: value,
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    dispatch(updateProfileUserAction(user));
  };

  const renderModal = () => {
    return (
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
          <form
            onSubmit={handleSubmit}
            style={{ background: "rgba(5,8,95, .9)", padding: "1em" }}
          >
            <Grid align="center" className={classes.title}>
              <h2>Thay đổi thông tin tài khoản</h2>
            </Grid>
            <div style={inputStyle}>
              <FormLabel style={{ color: "white" }}>Họ tên:</FormLabel>
              <CssTextField
                fullWidth
                required
                name="hoTen"
                onChange={handleChange}
                value={user.hoTen}
              ></CssTextField>
            </div>
            <div style={inputStyle}>
              <FormLabel style={{ color: "white" }}>Mật khẩu:</FormLabel>
              <CssTextField
                type="password"
                fullWidth
                required
                name="matKhau"
                onChange={handleChange}
                value={user.matKhau}
              ></CssTextField>
            </div>
            <div style={inputStyle}>
              <FormLabel style={{ color: "white" }}>Email:</FormLabel>
              <CssTextField
                fullWidth
                required
                name="email"
                onChange={handleChange}
                value={user.email}
              ></CssTextField>
            </div>
            <div style={inputStyle}>
              <FormLabel style={{ color: "white" }}>Số điện thoại:</FormLabel>
              <CssTextField
                fullWidth
                required
                name="soDt"
                onChange={handleChange}
                value={user.soDt}
              ></CssTextField>
            </div>
            <Button
              style={{ margin: "20px 0" }}
              type="submit"
              color="primary"
              variant="contained"
              fullWidth
            >
              Thay đổi
            </Button>
          </form>
        </Fade>
      </Modal>
    );
  };

  return (
    <div>
      {renderThongTinTaiKhoan()}
      {renderModal()}
    </div>
  );
}

export default ProfileUser;
