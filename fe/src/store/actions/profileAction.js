import axios from "axios";
import {
  GET_BOOK_TICKET_CHAIR,
  GET_PROFILE,
  UPDATE_PROFILE,
} from "../const/profileConst";

export const getProfileAction = (taiKhoan) => {
  return async (dispatch) => {
    try {
      const token = JSON.parse(localStorage.getItem("token"));
      const res = await axios({
        method: "GET",
        url: "http://localhost:8888/api/QuanLyNguoiDung/ThongTinTaiKhoan",
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });
      // console.log(res.data);
      dispatch({
        type: GET_PROFILE,
        payload: res.data,
      });
    } catch (error) {
      console.log(error);
    }
  };
};

export const getBookTicketChairAction = (maVe) => {
  return {
    type: GET_BOOK_TICKET_CHAIR,
    payload: maVe,
  };
};

export const updateProfileUserAction = (user) => {
  return async (dispatch) => {
    try {
      const token = JSON.parse(localStorage.getItem("token"));

      const res = await axios({
        url: "http://localhost:8888/api/QuanLyNguoiDung/CapNhatThongTinNguoiDung",
        method: "PUT",
        data: user,
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });
      console.log("data", res.data);
      dispatch({
        type: UPDATE_PROFILE,
        payload: res.data,
      });
      alert("cập nhật tài khoản thành công");
    } catch (error) {
      alert("cập nhật tài khoản thất bại");
      console.log(error);
    }
  };
};
