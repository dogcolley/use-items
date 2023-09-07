import { css } from '@emotion/react';
import ScrollToTop from './lib/ScrollToTop';
import Router from './Router';

function App() {
  return (
    <ScrollToTop>
      <Router />
    </ScrollToTop>
  );
}

export default App;
