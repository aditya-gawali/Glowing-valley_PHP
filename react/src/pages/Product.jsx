import React, { useEffect, useState } from 'react'
import { useParams, useNavigate } from 'react-router-dom'
import { useProductStore } from '../stores/productStore'
import { useCartStore } from '../stores/cartStore'

export default function Product(){
  const { id } = useParams()
  const navigate = useNavigate()
  const getProductById = useProductStore(s => s.getProductById)
  const add = useCartStore(s => s.add)
  const [product, setProduct] = useState(null)
  const [selectedWeight, setSelectedWeight] = useState(null)
  const [selectedPrice, setSelectedPrice] = useState(null)

  useEffect(() => {
    let mounted = true
    getProductById(id).then(p => {
      if (mounted) {
        setProduct(p)
        const weights = (p.weight || '').split(',').map(w => w.trim()).filter(Boolean)
        const prices = (p.prices || '').split(',').map(pr => pr.trim()).filter(Boolean)
        if (weights.length) setSelectedWeight(weights[0])
        if (prices.length) setSelectedPrice(Number(prices[0]))
      }
    })
    return () => { mounted = false }
  }, [id, getProductById])

  if (!product) return <div>Loading...</div>

  const weights = (product.weight || '').split(',').map(w => w.trim()).filter(Boolean)
  const prices = (product.prices || '').split(',').map(pr => pr.trim()).filter(Boolean)

  const handleAddToCart = () => {
    add({ id: product.id, name: product.name, image: product.image, weight: selectedWeight || '', price: Number(selectedPrice) || 0 })
    navigate('/cart')
  }

  const whatsappMessage = `I'm interested in this product: ${product.name}`
  const whatsappUrl = `https://wa.me/919422706998?text=${encodeURIComponent(whatsappMessage)}`

  return (
    <section className="overflow-hidden">
      <div className="mx-auto px-5 py-24">
        <div className="mx-auto flex flex-wrap items-center lg:w-4/5">
          <img className="h-72 w-full rounded-lg object-cover lg:h-96 lg:w-1/2" src={product.image || '/assets/react.svg'} alt={product.name} />
          <div className="mt-6 w-full lg:mt-0 lg:w-1/2 lg:pl-10">
            <h1 className="my-4 text-3xl font-semibold text-black border-b border-gray-300 pb-4 ">{product.name}</h1>
            <h2 className="text-lg font-semibold tracking-tighter">Uses and Benefits</h2>
            <p className="leading-relaxed">{product.uses}</p>
            {product.ingre && (
              <>
                <h2 className="text-lg font-bold tracking-tighter pt-4 ">Ingredients</h2>
                <p className="leading-relaxed pt-3">{product.ingre}</p>
              </>
            )}

            {weights.length > 0 && (
              <div className="my-4 border-b border-gray-300 pb-2">
                <h3 className="text-heading mb-2.5 text-base font-semibold capitalize md:text-lg">Weight</h3>
                <ul className="colors -mr-3 flex flex-wrap">
                  {weights.map((w, idx) => (
                    <li key={w} onClick={() => { setSelectedWeight(w); setSelectedPrice(prices[idx] || prices[0]) }}
                      className={`text-heading mb-2 mr-2 flex h-9 px-4 cursor-pointer items-center justify-center rounded border border-gray-300 p-1 text-xs font-semibold uppercase transition duration-200 ease-in-out hover:border-black md:mb-3 md:mr-3 md:h-11  md:text-sm ${selectedWeight === w ? 'bg-gray-200' : ''}`}>
                      {w}
                    </li>
                  ))}
                </ul>
              </div>
            )}

            <div className="flex items-center justify-between py-2">
              <span className="title-font text-2xl font-bold text-gray-900">{selectedPrice ? `₹ ${selectedPrice}` : ''}{product.category === 2 ? ' onwards' : ''}</span>

              <div className="flex gap-2">
                {product.category === 1 && (
                  <button onClick={handleAddToCart} className="rounded-md bg-[#041e42] px-3 py-2 text-lg font-semibold text-white shadow-sm hover:bg-[#041e42]/90">Add to Cart</button>
                )}
                <a href={whatsappUrl} target="_blank" rel="noreferrer">
                  <button className="rounded-md bg-green-500 px-3 py-2 text-lg font-semibold text-white shadow-sm hover:bg-green-400">Buy Now</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  )
}
