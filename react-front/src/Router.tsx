import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Home from './page/home';
import Admin from './page/admin';
import Test from './page/test'

function ErrorPage() {
  return <h1>404 - Not Found</h1>;
}


function Router() {
  return (
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/admin" element={<Admin />} />
        <Route path="/test" element={<Test />} />
        <Route path="/test/:page" element={<Test />} />
        <Route path="*" element={<ErrorPage />} />
      </Routes>
  )
}

export default Router;

