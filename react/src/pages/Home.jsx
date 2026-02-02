import React, { useEffect } from 'react'
import { useProductStore } from '../stores/productStore'
import ProductCard from '../components/ProductCard'

export default function Home(){
  const { products, fetchProducts } = useProductStore()
  useEffect(() => { fetchProducts() }, [fetchProducts])

  return (
    <section>
      <h1>Home</h1>
      <div className="product-grid">
        {products.map(p => <ProductCard key={p.id} product={p} />)}
      </div>
    </section>
  )
}
