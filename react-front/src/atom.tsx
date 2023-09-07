import { atom } from "recoil"

export const test = atom({
  key: "test",
  default: {
    id: "test",
    pwd: "1234",
  },
});