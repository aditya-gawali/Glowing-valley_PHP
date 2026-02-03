import React, { useEffect, useState } from 'react'
import { useProductStore } from '../stores/productStore'
import ProductCard from '../components/ProductCard'
import Founder from '../components/Founder'

export default function Home(){
  const fetchProducts = useProductStore(s => s.fetchProducts)
  const [popular, setPopular] = useState([])
  const [beauty, setBeauty] = useState([])
  const [hamper, setHamper] = useState([])

  useEffect(() => {
    let mounted = true
    fetchProducts({ popular: 1, limit: 4 }).then(d => mounted && setPopular(d))
    fetchProducts({ category: 1, limit: 8 }).then(d => mounted && setBeauty(d))
    fetchProducts({ category: 2, limit: 8 }).then(d => mounted && setHamper(d))
    return () => { mounted = false }
  }, [fetchProducts])

  return (
    <div>
      <div id="hero" className="w-full h-[30vh] lg:h-screen">
        <div className="mx-5 md:mx-20 my-5 h-[80%] border rounded-lg overflow-hidden shadow-xl">
          {/* For now, simple static carousel - original used Swiper */}
          <div className="w-full h-full">
            <img src="/assets/images/hero-2.png" alt="hero" className="w-full h-full object-cover" />
          </div>
        </div>
      </div>

      <section className="px-5 md:px-20 py-8">
        <h1 className="text-center text-2xl md:text-3xl font-bold py-4">Popular Now</h1>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mx-auto">
          {popular.map(p => <ProductCard key={p.id} product={p} />)}
        </div>
      </section>

      <section className="px-5 md:px-20 py-8">
        <div className="flex items-center justify-center py-4">
          <h1 className="text-center text-xl md:text-2xl font-bold p-2 rounded-l-xl bg-[#041e42] text-white">Beauty</h1>
          <h1 className="text-center text-xl md:text-2xl font-bold p-2 rounded-r-xl">Hamper</h1>
        </div>
        <div className="tabs w-full h-full">
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mx-auto">
            {beauty.map(p => <ProductCard key={p.id} product={p} />)}
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mx-auto mt-6">
            {hamper.map(p => <ProductCard key={p.id} product={p} />)}
          </div>
        </div>
      </section>

      <section className="py-10 px-5 md:px-20 flex flex-col gap-4">
        <h1 className="text-center w-full text-xl md:text-3xl font-bold py-4">The Great Crate</h1>
        <div className="grid grid-flow-row grid-cols-1">
          <div className="flex flex-col gap-4 rounded-lg overflow-hidden">
            <video src="/assets/images/hamper video.mp4" autoPlay loop muted className="w-full" />
          </div>
        </div>
      </section>

      <Founder />
    </div>
  )
}
