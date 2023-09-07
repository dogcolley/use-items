import { css, Global } from '@emotion/react';
import reset from 'styled-reset';

const styles = css`
  * {
    box-sizing: border-box;
    font-family: 'Apple SD Gothic Neo', Pretendard;
  }

  hr {
    margin: 0;
  }
  button {
    cursor: pointer;
    background-color: transparent;
    border: none;
    padding: 0;
  }
`;

function GlobalStyle() {
  return <Global styles={[reset, styles]} />;
}

export default GlobalStyle;
