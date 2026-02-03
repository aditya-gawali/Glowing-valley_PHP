import React from 'react'
import { Link } from 'react-router-dom'
import { useCartStore } from '../stores/cartStore'
import Search from './Search'

export default function Navbar(){
  const count = useCartStore(s => s.items.length)
  return (
    <header className="site-header py-4 px-6 shadow-xl bg-white text-black">
      <nav className="flex items-center justify-between">
        <div className="flex items-center gap-4">
          <Link to="/">
            <h1 className="text-2xl font-bold">Glowing Valley</h1>
          </Link>
        </div>
        <div className="items-center gap-6 text-md font-semibold hidden md:flex lg:text-lg">
          <Link to="/shop">Shop All</Link>
          <Link to="/popular">Popular Now</Link>
          <Link to="/about">About</Link>
          <Link to="/contact">Contact Us</Link>
        </div>
        <div className="flex items-center gap-6 text-xl font-bold">
          <Search />
          <Link to="/cart"> <i className="ri-shopping-cart-line"></i> ({count})</Link>
        </div>
      </nav>
    </header>
  )
}
