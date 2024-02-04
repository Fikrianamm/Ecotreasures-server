import { Link } from '@inertiajs/react'
import { HrefButton , HrefButtonOff } from '@/My-components/Buttons'
import React, { useEffect, useState } from 'react'
import { EcoTreasures } from './Logo';

export const Navigation = ({type}) => {

  const [scroll, setScroll] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      if (window.scrollY > 400) {
        setScroll(true);
      } else {
        setScroll(false);
      }
    };

    window.addEventListener('scroll', handleScroll);
    return () => {
      window.removeEventListener('scroll', handleScroll);
    };
  }, []);
  if (type == 1){
    return(
    <nav id='nav-main' className={`pt-5 pb-5 pr-10 pl-10 fixed flex w-full z-20 bg-white`}>
      <div className='flex-1'>
        <EcoTreasures type={`1`} />
      </div>
      <div className='flex-2'>
          <ul className={`flex space-x-4 text-slate-800 items-center`}>
          <Link href={'/'}><li className='hov-b'>Marketplace</li></Link>
          <Link href={"#layanan"}><li className='hov-b'>Layanan</li></Link>
              <li className='flex space-x-1'>
                  <HrefButtonOff color={`1`} href="/register" nama="Sign Up" />
                  <HrefButton href="/login" nama="Login" />
              </li>
          </ul>
      </div>
  </nav>
  )}else{
  return (
    <nav id='nav-main' className={`pt-5 pb-5 pr-10 pl-10 fixed flex w-full z-20 ${scroll ?  'bg-white bg-opacity-50 backdrop-blur-sm border-b-[0.5px] border border-0 transition-all border-gray-200' : ''} `}>
      <div className='flex-1'>
        <EcoTreasures type={`${scroll ? 1 : ''}`} />
      </div>
      <div className='flex-2'>
          <ul className={`flex space-x-4 ${scroll ? 'text-slate-800' : 'text-gray-50' } items-center`}>
          <Link href={'/'}><li className='hov-b'>Marketplace</li></Link>
          <Link href={"#layanan"}><li className='hov-b'>Layanan</li></Link>
              <li className='flex space-x-1'>
                  <HrefButtonOff color={`${scroll ? 1 : ''}`} href="/register" nama="Sign Up" />
                  <HrefButton href="/login" nama="Login" />
              </li>
          </ul>
      </div>
  </nav>
  )}
};
