import { ComponentFixture, TestBed } from '@angular/core/testing';
import {MatDialog, MatDialogRef} from "@angular/material/dialog";

import { IndexComponent } from './index.component';
import { QuoteService } from '@services/models/quote.service';
import { of } from 'rxjs';
import { TestDataPaginator } from '../../../../testing/TestDataPaginator';
import { HttpClient, HttpHandler } from '@angular/common/http';
import { QuotesModule } from "@pages/quotes/quotes.module";

describe('IndexComponent', () => {
  let component: IndexComponent;
  let fixture: ComponentFixture<IndexComponent>;
  let dialog: MatDialog;
  let quoteService: QuoteService;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [QuotesModule],
      providers: [QuoteService, HttpClient, HttpHandler],
      declarations: [IndexComponent]
    });
    fixture = TestBed.createComponent(IndexComponent);
    component = fixture.componentInstance;
    dialog = TestBed.inject(MatDialog);
    quoteService = TestBed.inject(QuoteService);
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });

  it('should print "No quotes found." on empty paged response', () => {
    quoteService.list = () => of((new TestDataPaginator([])).get());
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();
    expect(fixture.nativeElement.querySelector('table').textContent).toEqual("No quotes found.");
  });

  it('should print the quote information as passed in', () => {
    let data = [{
      id: 1,
      quote: "A quote",
      source: "Some Ref",
      active: false,
    }, {
      id: 2,
      quote: "Another quote",
      source: "Another Ref",
      active: true,
    }];
    quoteService.list = () => of((new TestDataPaginator(data)).get());
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();
    let content = fixture.nativeElement.querySelector('table').textContent;
    expect(content).toContain("A quote");
    expect(content).toContain("Some Ref");
    expect(content).toContain("Another quote");
    expect(content).toContain("Another Ref");
  });

  it('delete on confirmation', () => {
    let data = [{
      id: 1,
      quote: "A quote",
      source: "A Ref",
      active: true,
    }];
    quoteService.list = () => of((new TestDataPaginator(data)).get());
    const quoteServiceDeleteSpy = spyOn(quoteService, 'delete');
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();

    let content = fixture.nativeElement.querySelector('table').textContent;
    let deleteButton = fixture.nativeElement.querySelector('button.delete');
    expect(content).toContain("A quote");

    spyOn(dialog, 'open').and.returnValue({
      afterClosed: () => of(true)
    } as unknown as MatDialogRef<any>);
    deleteButton.click();
    expect(quoteServiceDeleteSpy).toHaveBeenCalledTimes(1);
  });

  it('avoid delete on negating confirmation', () => {
    let data = [{
      id: 1,
      quote: "A quote",
      source: "A Ref",
      active: true,
    }];
    quoteService.list = () => of((new TestDataPaginator(data)).get());
    const drinkServiceDeleteSpy = spyOn(quoteService, 'delete');
    fixture = TestBed.createComponent(IndexComponent);
    fixture.detectChanges();

    let content = fixture.nativeElement.querySelector('table').textContent;
    let deleteButton = fixture.nativeElement.querySelector('button.delete');
    expect(content).toContain("A quote");

    spyOn(dialog, 'open').and.returnValue({
      afterClosed: () => of(false)
    } as unknown as MatDialogRef<any>);
    deleteButton.click();
    expect(drinkServiceDeleteSpy).toHaveBeenCalledTimes(0);
  });
});
