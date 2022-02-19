import React, { useEffect, useState } from 'react';
import { Routes, Route } from "react-router-dom";
import Login from './components/Login';
import Signup from './components/Signup';
import Welcome from './components/Welcome';
import './App.css';


export default function App() {

  const [isLogin, setLoggedIn] = useState(false);


  useEffect(() => {
    if (localStorage.getItem('token')) {
      setLoggedIn(true);
    }
  }, [isLogin]);

  return (
      <Routes>
        <Route path="/signup" element={isLogin ? <Welcome /> : <Signup />} />
        <Route path="/" element={isLogin ? <Welcome /> : <Login />} />
      </Routes>
  );
}