import React from 'react'
import { Routes, Route } from 'react-router-dom'
import Home from './pages/Home'
import Shop from './pages/Shop'
import Product from './pages/Product'
import Cart from './pages/Cart'
import About from './pages/About'
import Contact from './pages/Contact'
import Popular from './pages/Popular'
import Navbar from './components/Navbar'
import Footer from './components/Footer'
import AdminDashboard from './admin/AdminDashboard'
import AdminLogin from './admin/AdminLogin'
import NewProduct from './admin/NewProduct'
import ProtectedRoute from './admin/ProtectedRoute'

export default function AppRouter(){
  return (
    <>
      <Navbar />
      <main>
        <Routes>
          <Route path="/" element={<Home/>} />
          <Route path="/shop" element={<Shop/>} />
          <Route path="/product/:id" element={<Product/>} />
          <Route path="/cart" element={<Cart/>} />
          <Route path="/about" element={<About/>} />
          <Route path="/contact" element={<Contact/>} />
          <Route path="/popular" element={<Popular/>} />

          <Route path="/admin/login" element={<AdminLogin/>} />
          <Route path="/admin" element={<ProtectedRoute><AdminDashboard/></ProtectedRoute>} />
          <Route path="/admin/new" element={<ProtectedRoute><NewProduct/></ProtectedRoute>} />
        </Routes>
      </main>
      <Footer />
    </>
  )
}
