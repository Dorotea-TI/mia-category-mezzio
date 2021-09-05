import { Injectable } from '@angular/core';
import { MiaCategory } from '../entities/mia_category';
import { MiaBaseCrudHttpService } from '@agencycoda/mia-core';
import { HttpClient } from '@angular/common/http';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class MiaCategoryService extends MiaBaseCrudHttpService<MiaCategory> {

  constructor(
    protected http: HttpClient
  ) {
    super(http);
    this.basePathUrl = environment.baseUrl + 'mia-category';
  }
 
}