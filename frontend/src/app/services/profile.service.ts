import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import apiConfig from '../constants/apiConfig';
import { Subject } from 'rxjs';
import IUser from '../models/user.model';

@Injectable({
  providedIn: 'root',
})
export class ProfileService {
  constructor(private http: HttpClient) {}
  getProfile(url: string) {
    var res = new Subject<{ user: IUser; currentUser: boolean }>();
    const headers = new HttpHeaders({
      Authorization: `Bearer ${localStorage.getItem('token')}`,
    });
    const fetchedUser = this.http.get(`${apiConfig.baseUrl}/profile/${url}`, {
      headers,
    });
    fetchedUser.subscribe({
      next: (value: any) => {
        res.next(value);
      },
      error: (e) => {
        res.next(e);
      },
    });
    return res.asObservable();
  }
}