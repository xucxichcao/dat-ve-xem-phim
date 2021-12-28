import React, { useEffect } from 'react';
import Header from '../components/Header';
import MovieSlider from '../components/MovieSlider';
import BookingTool from '../components/BookingTool';
import MoviesList from '../components/MoviesList';
import BlockApp from '../components/BlockApp';

import { useDispatch } from 'react-redux';
import {
  getMovieListNowShowingAction,
  getMovieListUpComingAction,
} from '../store/actions/movieAction';
import Cinema from '../components/Cinema';
import { getCinemaListAction } from '../store/actions/cinemaAction';
import Footer from '../components/Footer';

export default function HomePage() {
  const dispatch = useDispatch();
  useEffect(() => {
    dispatch(getMovieListNowShowingAction());
  }, [dispatch]);
  useEffect(() => {
    dispatch(getMovieListUpComingAction());
  }, [dispatch]);
  useEffect(() => {
    dispatch(getCinemaListAction());
  }, [dispatch]);
  return (
    <>
      <Header />
      <MovieSlider />
      <BookingTool />
      <MoviesList />
      <Cinema />
      <BlockApp />
      <Footer />
    </>
  );
}
