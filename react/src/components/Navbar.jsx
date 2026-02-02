import React from 'react'
import { Link } from 'react-router-dom'
import { useCartStore } from '../stores/cartStore'

export default function Navbar(){
  const count = useCartStore(s => s.items.length)
  return (
    <header className="site-header">
      <nav>
        <Link to="/">Home</Link>
        <Link to="/shop">Shop</Link>
        <Link to="/contact">Contact</Link>
        <Link to="/cart">Cart ({count})</Link>
      </nav>
    </header>
  )
}
