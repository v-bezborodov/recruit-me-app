export default class RecruitService {
  constructor() {
    this.endpoint = '/manage/recrutation';
  }

  get(id){
    return axios.get(`${this.endpoint}/${id}`);
  }
  getAll(){
    return axios.get('/manage/recrutation-all');
  }
  store(data){
    return axios.post(`${this.endpoint}`, data);
  }
  put(id, data){
    return axios.put(`${this.endpoint}/${id}`, data);
  }
}
